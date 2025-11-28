<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Kurma Ajwa Premium',
                'description' => 'Kurma ajwa asli dari Madinah dengan kualitas terbaik untuk mendukung kegiatan tahfidz',
                'price' => 150000,
                'category' => 'dates',
                'stock' => 50,
                'is_active' => true,
            ],
            [
                'name' => 'Kurma Medjool',
                'description' => 'Kurma medjool besar dan manis, cocok untuk camilan sehat saat belajar Al-Quran',
                'price' => 120000,
                'category' => 'dates',
                'stock' => 30,
                'is_active' => true,
            ],
            [
                'name' => 'Kurma Sukkari',
                'description' => 'Kurma sukkari dengan rasa manis alami, pilihan tepat untuk santapan sehari-hari',
                'price' => 100000,
                'category' => 'dates',
                'stock' => 40,
                'is_active' => true,
            ],
            [
                'name' => 'Mukena Premium',
                'description' => 'Mukena berkualitas tinggi dengan bahan lembut dan desain elegan untuk sholat',
                'price' => 250000,
                'category' => 'clothing',
                'stock' => 20,
                'is_active' => true,
            ],
            [
                'name' => 'Sarung Tahfidz',
                'description' => 'Sarung khusus untuk santri tahfidz dengan bahan nyaman dan tahan lama',
                'price' => 180000,
                'category' => 'clothing',
                'stock' => 25,
                'is_active' => true,
            ],
            [
                'name' => 'Buku Tahfidz Al-Quran',
                'description' => 'Buku panduan tahfidz dengan metode yang mudah dipahami untuk semua level',
                'price' => 75000,
                'category' => 'books',
                'stock' => 35,
                'is_active' => true,
            ],
            [
                'name' => 'Tasbih Digital',
                'description' => 'Tasbih elektronik dengan counter otomatis untuk menghitung dzikir dan sholat',
                'price' => 95000,
                'category' => 'accessories',
                'stock' => 15,
                'is_active' => true,
            ],
            [
                'name' => 'Minyak Zaitun Premium',
                'description' => 'Minyak zaitun extra virgin berkualitas tinggi untuk kesehatan dan kecantikan',
                'price' => 200000,
                'category' => 'food',
                'stock' => 20,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
