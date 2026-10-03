<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        abort_unless(
            $product->is_active && $product->stock > 0,
            404
        );

        $quantity = (int) $request->input('quantity', 1);

        if ($quantity < 1) {
            return back()->with('error', 'Jumlah produk tidak valid.');
        }

        if ($quantity > $product->stock) {
            return back()->with(
                'error',
                'Jumlah yang dipilih melebihi stok tersedia.'
            );
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $newQuantity = $cart[$product->id]['quantity'] + $quantity;

            if ($newQuantity > $product->stock) {
                return back()->with(
                    'error',
                    'Jumlah produk di keranjang melebihi stok tersedia.'
                );
            }

            $cart[$product->id]['quantity'] = $newQuantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'unit' => $product->unit,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return back()->with(
            'success',
            $product->name . ' berhasil ditambahkan ke keranjang.'
        );
    }

    public function index()
    {
        $cart = session()->get('cart', []);

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('cart.index', compact('cart', 'total'));
    }

    public function remove($productId)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function update(Request $request, $productId)
    {
        $cart = session()->get('cart', []);

        if (! isset($cart[$productId])) {
            return back()->with('error', 'Produk tidak ditemukan di keranjang.');
        }

        $quantity = (int) $request->input('quantity');

        if ($quantity < 1) {
            return back()->with('error', 'Jumlah produk minimal 1.');
        }

        $product = Product::find($productId);

        if (! $product || ! $product->is_active || $product->stock < $quantity) {
            return back()->with('error', 'Jumlah melebihi stok yang tersedia.');
        }

        $cart[$productId]['quantity'] = $quantity;

        session()->put('cart', $cart);

        return back()->with('success', 'Jumlah produk berhasil diperbarui.');
    }
}