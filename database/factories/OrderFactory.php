<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'order_number' => 'ORD-' . fake()->unique()->numerify('########'),
            'total_amount' => fake()->numberBetween(50000, 500000),
            'status' => fake()->randomElement([
                'pending',
                'processing',
                'shipped',
                'completed',
                'cancelled',
            ]),
            'ordered_at' => fake()->dateTimeBetween('-3 months', 'now'),
        ];
    }
}