<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['required', 'string', 'max:1000'],
        ]);

        $hasPurchased = OrderItem::where('product_id', $product->id)
            ->whereHas('order', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->exists();

        if (! $hasPurchased) {
            return back()->with(
                'error',
                'Kamu hanya dapat memberikan review untuk produk yang pernah dibeli.'
            );
        }

        $alreadyReviewed = Review::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->exists();

        if ($alreadyReviewed) {
            return back()->with(
                'error',
                'Kamu sudah memberikan review untuk produk ini.'
            );
        }

        Review::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with(
            'success',
            'Review berhasil ditambahkan.'
        );
    }
}