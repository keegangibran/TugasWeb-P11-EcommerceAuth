<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang kamu masih kosong.');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('checkout.index', compact('cart', 'total'));
    }

    public function store()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Keranjang kamu masih kosong.');
        }

        $order = DB::transaction(function () use ($cart) {

            $total = 0;

            foreach ($cart as $productId => $item) {
                $product = \App\Models\Product::lockForUpdate()->find($productId);

                if (! $product || ! $product->is_active) {
                    throw new \RuntimeException(
                        "Produk {$item['name']} sudah tidak tersedia."
                    );
                }

                if ($product->stock < $item['quantity']) {
                    throw new \RuntimeException(
                        "Stok {$product->name} tidak mencukupi."
                    );
                }

                $total += $product->price * $item['quantity'];
            }

            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => 'FM-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(5)),
                'total_amount' => $total,
                'status' => 'pending',
                'ordered_at' => now(),
            ]);

            foreach ($cart as $productId => $item) {
                $product = \App\Models\Product::lockForUpdate()->find($productId);

                $subtotal = $product->price * $item['quantity'];

                $order->orderItems()->create([
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'subtotal' => $subtotal,
                ]);

                $product->decrement('stock', $item['quantity']);
            }

            $order->payment()->create([
                'method' => 'cod',
                'amount' => $total,
                'status' => 'pending',
            ]);

            return $order;
        });

        session()->forget('cart');

        return redirect()
            ->route('checkout.success', $order)
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    public function success(Order $order)
    {
        abort_unless(
            $order->user_id === auth()->id(),
            403
        );

        $order->load('orderItems.product', 'payment');

        return view('checkout.success', compact('order'));
    }
}