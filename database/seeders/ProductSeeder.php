<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id', 'name');

        $products = [
            // =========================
            // SAYURAN
            // =========================
            [
                'category' => 'Sayuran',
                'name' => 'Bayam Segar',
                'description' => 'Bayam segar pilihan untuk kebutuhan masakan sehari-hari.',
                'price' => 5000,
                'stock' => 40,
                'unit' => 'Ikat',
            ],
            [
                'category' => 'Sayuran',
                'name' => 'Kangkung Segar',
                'description' => 'Kangkung segar dan berkualitas.',
                'price' => 5000,
                'stock' => 45,
                'unit' => 'Ikat',
            ],
            [
                'category' => 'Sayuran',
                'name' => 'Wortel',
                'description' => 'Wortel segar dengan kualitas terbaik.',
                'price' => 12000,
                'stock' => 35,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Sayuran',
                'name' => 'Brokoli',
                'description' => 'Brokoli segar untuk berbagai hidangan.',
                'price' => 18000,
                'stock' => 25,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Sayuran',
                'name' => 'Kentang',
                'description' => 'Kentang segar untuk kebutuhan rumah tangga.',
                'price' => 15000,
                'stock' => 50,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Sayuran',
                'name' => 'Tomat',
                'description' => 'Tomat merah segar dan berkualitas.',
                'price' => 10000,
                'stock' => 45,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Sayuran',
                'name' => 'Timun',
                'description' => 'Timun segar dan renyah.',
                'price' => 8000,
                'stock' => 40,
                'unit' => 'Kg',
            ],

            // =========================
            // BUAH-BUAHAN
            // =========================
            [
                'category' => 'Buah-buahan',
                'name' => 'Apel Fuji',
                'description' => 'Apel Fuji segar dengan rasa manis dan renyah.',
                'price' => 35000,
                'stock' => 30,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Buah-buahan',
                'name' => 'Jeruk Medan',
                'description' => 'Jeruk segar dengan rasa manis dan menyegarkan.',
                'price' => 25000,
                'stock' => 35,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Buah-buahan',
                'name' => 'Pisang Cavendish',
                'description' => 'Pisang Cavendish matang dan siap dikonsumsi.',
                'price' => 20000,
                'stock' => 30,
                'unit' => 'Sisir',
            ],
            [
                'category' => 'Buah-buahan',
                'name' => 'Mangga Harum Manis',
                'description' => 'Mangga harum manis dengan rasa manis dan legit.',
                'price' => 28000,
                'stock' => 25,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Buah-buahan',
                'name' => 'Semangka',
                'description' => 'Semangka segar dan manis.',
                'price' => 18000,
                'stock' => 20,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Buah-buahan',
                'name' => 'Pepaya',
                'description' => 'Pepaya matang dengan rasa manis.',
                'price' => 15000,
                'stock' => 25,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Buah-buahan',
                'name' => 'Melon',
                'description' => 'Melon segar dengan tekstur lembut dan manis.',
                'price' => 22000,
                'stock' => 20,
                'unit' => 'Kg',
            ],

            // =========================
            // DAGING
            // =========================
            [
                'category' => 'Daging',
                'name' => 'Dada Ayam Fillet',
                'description' => 'Daging dada ayam tanpa tulang.',
                'price' => 45000,
                'stock' => 30,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Daging',
                'name' => 'Paha Ayam',
                'description' => 'Paha ayam segar berkualitas.',
                'price' => 38000,
                'stock' => 35,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Daging',
                'name' => 'Daging Sapi Has Dalam',
                'description' => 'Daging sapi has dalam berkualitas.',
                'price' => 135000,
                'stock' => 20,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Daging',
                'name' => 'Daging Sapi Giling',
                'description' => 'Daging sapi giling segar.',
                'price' => 110000,
                'stock' => 25,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Daging',
                'name' => 'Daging Kambing',
                'description' => 'Daging kambing segar pilihan.',
                'price' => 125000,
                'stock' => 15,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Daging',
                'name' => 'Ati Ayam',
                'description' => 'Ati ayam segar untuk berbagai masakan.',
                'price' => 30000,
                'stock' => 25,
                'unit' => 'Kg',
            ],

            // =========================
            // IKAN & SEAFOOD
            // =========================
            [
                'category' => 'Ikan & Seafood',
                'name' => 'Ikan Nila',
                'description' => 'Ikan nila segar untuk kebutuhan keluarga.',
                'price' => 35000,
                'stock' => 30,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Ikan & Seafood',
                'name' => 'Ikan Lele',
                'description' => 'Ikan lele segar dan berkualitas.',
                'price' => 28000,
                'stock' => 35,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Ikan & Seafood',
                'name' => 'Ikan Kembung',
                'description' => 'Ikan kembung segar untuk berbagai olahan.',
                'price' => 40000,
                'stock' => 25,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Ikan & Seafood',
                'name' => 'Udang Vaname',
                'description' => 'Udang vaname segar dan berkualitas.',
                'price' => 85000,
                'stock' => 20,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Ikan & Seafood',
                'name' => 'Cumi-cumi',
                'description' => 'Cumi-cumi segar untuk berbagai masakan.',
                'price' => 75000,
                'stock' => 20,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Ikan & Seafood',
                'name' => 'Ikan Tongkol',
                'description' => 'Ikan tongkol segar pilihan.',
                'price' => 40000,
                'stock' => 25,
                'unit' => 'Kg',
            ],

            // =========================
            // TELUR
            // =========================
            [
                'category' => 'Telur',
                'name' => 'Telur Ayam Negeri',
                'description' => 'Telur ayam negeri segar.',
                'price' => 30000,
                'stock' => 50,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Telur',
                'name' => 'Telur Ayam Kampung',
                'description' => 'Telur ayam kampung segar.',
                'price' => 45000,
                'stock' => 30,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Telur',
                'name' => 'Telur Bebek',
                'description' => 'Telur bebek segar berkualitas.',
                'price' => 40000,
                'stock' => 25,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Telur',
                'name' => 'Telur Puyuh',
                'description' => 'Telur puyuh segar.',
                'price' => 18000,
                'stock' => 35,
                'unit' => 'Pack',
            ],
            [
                'category' => 'Telur',
                'name' => 'Telur Omega 3',
                'description' => 'Telur ayam dengan kandungan Omega 3.',
                'price' => 40000,
                'stock' => 25,
                'unit' => 'Pack',
            ],

            // =========================
            // SEMBAKO
            // =========================
            [
                'category' => 'Sembako',
                'name' => 'Beras Premium 5 Kg',
                'description' => 'Beras premium berkualitas untuk kebutuhan keluarga.',
                'price' => 75000,
                'stock' => 40,
                'unit' => 'Pack',
            ],
            [
                'category' => 'Sembako',
                'name' => 'Beras Medium 5 Kg',
                'description' => 'Beras medium berkualitas dengan harga terjangkau.',
                'price' => 65000,
                'stock' => 45,
                'unit' => 'Pack',
            ],
            [
                'category' => 'Sembako',
                'name' => 'Minyak Goreng 2 Liter',
                'description' => 'Minyak goreng untuk kebutuhan memasak sehari-hari.',
                'price' => 38000,
                'stock' => 50,
                'unit' => 'Liter',
            ],
            [
                'category' => 'Sembako',
                'name' => 'Gula Pasir 1 Kg',
                'description' => 'Gula pasir putih berkualitas.',
                'price' => 18000,
                'stock' => 50,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Sembako',
                'name' => 'Tepung Terigu 1 Kg',
                'description' => 'Tepung terigu serbaguna.',
                'price' => 13000,
                'stock' => 45,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Sembako',
                'name' => 'Mi Instan Goreng',
                'description' => 'Mi instan goreng praktis untuk kebutuhan sehari-hari.',
                'price' => 3500,
                'stock' => 100,
                'unit' => 'Pcs',
            ],
            [
                'category' => 'Sembako',
                'name' => 'Mi Instan Kuah',
                'description' => 'Mi instan kuah dengan rasa gurih.',
                'price' => 3500,
                'stock' => 100,
                'unit' => 'Pcs',
            ],

            // =========================
            // SUSU & PRODUK OLAHAN
            // =========================
            [
                'category' => 'Susu & Produk Olahan',
                'name' => 'Susu UHT Full Cream 1 Liter',
                'description' => 'Susu UHT full cream untuk keluarga.',
                'price' => 18000,
                'stock' => 40,
                'unit' => 'Liter',
            ],
            [
                'category' => 'Susu & Produk Olahan',
                'name' => 'Susu UHT Cokelat 1 Liter',
                'description' => 'Susu UHT rasa cokelat yang lezat.',
                'price' => 19000,
                'stock' => 35,
                'unit' => 'Liter',
            ],
            [
                'category' => 'Susu & Produk Olahan',
                'name' => 'Keju Cheddar',
                'description' => 'Keju cheddar untuk berbagai hidangan.',
                'price' => 25000,
                'stock' => 30,
                'unit' => 'Pack',
            ],
            [
                'category' => 'Susu & Produk Olahan',
                'name' => 'Yogurt Plain',
                'description' => 'Yogurt plain segar dengan rasa alami.',
                'price' => 18000,
                'stock' => 25,
                'unit' => 'Pack',
            ],
            [
                'category' => 'Susu & Produk Olahan',
                'name' => 'Butter',
                'description' => 'Butter berkualitas untuk memasak dan membuat kue.',
                'price' => 30000,
                'stock' => 25,
                'unit' => 'Pack',
            ],
            [
                'category' => 'Susu & Produk Olahan',
                'name' => 'Susu Kental Manis',
                'description' => 'Susu kental manis untuk minuman dan makanan.',
                'price' => 14000,
                'stock' => 40,
                'unit' => 'Kaleng',
            ],

            // =========================
            // BUMBU & REMPAH
            // =========================
            [
                'category' => 'Bumbu & Rempah',
                'name' => 'Bawang Merah',
                'description' => 'Bawang merah segar untuk kebutuhan memasak.',
                'price' => 35000,
                'stock' => 40,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Bumbu & Rempah',
                'name' => 'Bawang Putih',
                'description' => 'Bawang putih segar berkualitas.',
                'price' => 32000,
                'stock' => 40,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Bumbu & Rempah',
                'name' => 'Cabai Merah',
                'description' => 'Cabai merah segar dengan rasa pedas.',
                'price' => 45000,
                'stock' => 30,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Bumbu & Rempah',
                'name' => 'Cabai Rawit',
                'description' => 'Cabai rawit segar dengan tingkat kepedasan tinggi.',
                'price' => 50000,
                'stock' => 25,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Bumbu & Rempah',
                'name' => 'Jahe',
                'description' => 'Jahe segar untuk bumbu dan minuman.',
                'price' => 25000,
                'stock' => 30,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Bumbu & Rempah',
                'name' => 'Kunyit',
                'description' => 'Kunyit segar untuk berbagai masakan.',
                'price' => 20000,
                'stock' => 30,
                'unit' => 'Kg',
            ],
            [
                'category' => 'Bumbu & Rempah',
                'name' => 'Lengkuas',
                'description' => 'Lengkuas segar untuk bumbu masakan.',
                'price' => 18000,
                'stock' => 25,
                'unit' => 'Kg',
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'category_id' => $categories[$product['category']],
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'stock' => $product['stock'],
                'unit' => $product['unit'],
                'image' => null,
                'is_active' => true,
            ]);
        }
    }
}