<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::where('role', 'user')->get();
        $products = Product::where('is_active', true)->get();

        foreach ($users as $user) {
            for ($i = 1; $i <= 3; $i++) {
                $order = Order::create([
                    'user_id' => $user->id,
                    'order_number' => 'ORD-' . strtoupper(Str::random(8)),
                    'total_amount' => 0,
                    'status' => fake()->randomElement([
                        'pending',
                        'processing',
                        'shipped',
                        'completed',
                    ]),
                    'ordered_at' => fake()->dateTimeBetween(
                        '-2 months',
                        'now'
                    ),
                ]);

                $total = 0;

                $selectedProducts = $products
                    ->random(rand(2, 4));

                foreach ($selectedProducts as $product) {
                    $quantity = rand(1, 3);
                    $price = $product->price;
                    $subtotal = $quantity * $price;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                        'price' => $price,
                        'subtotal' => $subtotal,
                    ]);

                    $total += $subtotal;
                }

                $order->update([
                    'total_amount' => $total,
                ]);

                Payment::create([
                    'order_id' => $order->id,
                    'method' => fake()->randomElement([
                        'qris',
                        'bank_transfer',
                        'e_wallet',
                        'cod',
                    ]),
                    'amount' => $total,
                    'status' => $order->status === 'cancelled'
                        ? 'failed'
                        : fake()->randomElement([
                            'pending',
                            'paid',
                        ]),
                    'paid_at' => fake()->optional()->dateTimeBetween(
                        '-2 months',
                        'now'
                    ),
                ]);
            }
        }
    }
}