<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('role', 'user')->first();

        $products = Product::where('is_active', true)
            ->take(10)
            ->get();

        foreach ($products as $product) {
            Review::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'rating' => fake()->numberBetween(3, 5),
                'comment' => fake()->randomElement([
                    'Produk bagus dan kualitasnya sesuai.',
                    'Barang segar dan dikemas dengan baik.',
                    'Kualitas produk cukup memuaskan.',
                    'Produk sesuai dengan deskripsi.',
                    'Pengiriman cepat dan produk diterima dengan baik.',
                ]),
            ]);
        }
    }
}