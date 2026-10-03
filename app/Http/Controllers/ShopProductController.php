<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ShopProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->where('is_active', true)
            ->where('stock', '>', 0)
            ->latest()
            ->paginate(12);

        return view('shop.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        abort_unless(
            $product->is_active && $product->stock > 0,
            404
        );

        $product->load([
            'category',
            'reviews.user',
        ]);

        $hasPurchased = \App\Models\OrderItem::where('product_id', $product->id)
            ->whereHas('order', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->exists();

        $hasReviewed = \App\Models\Review::where('product_id', $product->id)
            ->where('user_id', auth()->id())
            ->exists();

        return view('shop.products.show', compact(
            'product',
            'hasPurchased',
            'hasReviewed'
        ));
    }
}