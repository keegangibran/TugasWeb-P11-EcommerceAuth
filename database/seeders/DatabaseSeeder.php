<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\ReviewSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sayuran',
                'description' => 'Berbagai jenis sayuran segar untuk kebutuhan sehari-hari.',
            ],
            [
                'name' => 'Buah-buahan',
                'description' => 'Buah segar pilihan dengan kualitas terbaik.',
            ],
            [
                'name' => 'Daging',
                'description' => 'Berbagai jenis daging segar untuk kebutuhan masakan.',
            ],
            [
                'name' => 'Ikan & Seafood',
                'description' => 'Ikan dan hasil laut segar untuk kebutuhan sehari-hari.',
            ],
            [
                'name' => 'Telur',
                'description' => 'Berbagai jenis telur segar dan berkualitas.',
            ],
            [
                'name' => 'Sembako',
                'description' => 'Kebutuhan pokok rumah tangga sehari-hari.',
            ],
            [
                'name' => 'Susu & Produk Olahan',
                'description' => 'Susu dan berbagai produk olahan berbahan dasar susu.',
            ],
            [
                'name' => 'Bumbu & Rempah',
                'description' => 'Bumbu dan rempah untuk berbagai kebutuhan memasak.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(ReviewSeeder::class);
    }
}