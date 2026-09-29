<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'order_id' => Order::factory(),
            'method' => fake()->randomElement([
                'qris',
                'bank_transfer',
                'e_wallet',
                'cod',
            ]),
            'amount' => fake()->numberBetween(50000, 500000),
            'status' => fake()->randomElement([
                'pending',
                'paid',
                'failed',
                'refunded',
            ]),
            'paid_at' => fake()->optional()->dateTimeBetween(
                '-3 months',
                'now'
            ),
        ];
    }
}