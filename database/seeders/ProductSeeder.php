<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Rexus Gaming Keyboard',
                'slug' => 'rexus-gaming-keyboard',
                'category_id' => 1,
                'price' => 270000.00,
                'discount_percentage' => 0.20,
                'best_prod' => 0,
                'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium cum sit nemo inventore dolore saepe consectetur incidunt, eius eaque voluptatum?',
                'image1' => '..\img\productsImg\rexus.jpg',
                'image2' => '..\img\productsImg\rexus1.jpg',
                'image3' => '..\img\productsImg\rexus2.jpg',
                'image4' => '..\img\productsImg\rexus3.jpg',
                'image5' => '..\img\productsImg\rexus4.jpg',
            ],
            [
                'title' => 'Logitech G Pro X Mechanical Gaming Keyboard',
                'slug' => 'logitech-g-pro-x-mechanical-gaming-keyboard',
                'category_id' => 1,
                'price' => 1500000.00,
                'discount_percentage' => 0.25,
                'best_prod' => 1,
                'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium cum sit nemo inventore dolore saepe consectetur incidunt, eius eaque voluptatum?'
            ],
            [
                'title' => 'Logitech Mouse Gaming Proteus Core Tunable G502',
                'slug' => 'logitech-mouse-gaming-proteus-core-tunable-g502',
                'category_id' => 2,
                'price' => 500000.00,
                'discount_percentage' => 0.25,
                'best_prod' => 1,
                'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium cum sit nemo inventore dolore saepe consectetur incidunt, eius eaque voluptatum?'
            ],
            [
                'title' => 'ASUS ROG Strix XG32VQ',
                'slug' => 'asus-rog-strix-xg32vq',
                'category_id' => 3,
                'price' => 11000000.00,
                'discount_percentage' => 0.25,
                'best_prod' => 1,
                'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium cum sit nemo inventore dolore saepe consectetur incidunt, eius eaque voluptatum?'
            ],
            [
                'title' => 'Acer Predator Z35',
                'slug' => 'acer-predator-z35',
                'category_id' => 3,
                'price' => 16500000.00,
                'discount_percentage' => 0.20,
                'best_prod' => 0,
                'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium cum sit nemo inventore dolore saepe consectetur incidunt, eius eaque voluptatum?'
            ],
            [
                'title' => 'Dragonwar GT-006',
                'slug' => 'dragonwar-gt-006',
                'category_id' => 8,
                'price' => 2000000.00,
                'discount_percentage' => 0.20,
                'best_prod' => 0,
                'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium cum sit nemo inventore dolore saepe consectetur incidunt, eius eaque voluptatum?'
            ],
            [
                'title' => 'Sony PlayStation 5',
                'slug' => 'sony-playstation-5',
                'category_id' => 4,
                'price' => 10000000.00,
                'discount_percentage' => 0.25,
                'best_prod' => 1,
                'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium cum sit nemo inventore dolore saepe consectetur incidunt, eius eaque voluptatum?'
            ],
            [
                'title' => 'Nintendo Switch Red & Blue Neon',
                'slug' => 'nintendo-switch-red-&-blue-neon',
                'category_id' => 4,
                'price' => 5600000.00,
                'discount_percentage' => 0.25,
                'best_prod' => 1,
                'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium cum sit nemo inventore dolore saepe consectetur incidunt, eius eaque voluptatum?'
            ],
            [
                'title' => 'REXUS 7.1 THUNDERVOX HX20 RGB',
                'slug' => 'rexus-7.1-thundervox-hrX20-rgb',
                'category_id' => 9,
                'price' => 500000.00,
                'discount_percentage' => 0.25,
                'best_prod' => 1,
                'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium cum sit nemo inventore dolore saepe consectetur incidunt, eius eaque voluptatum?'
            ],
            [
                'title' => 'STracing Classic Series',
                'slug' => 'stracing-classic-series',
                'category_id' => 6,
                'price' => 3200000.00,
                'discount_percentage' => 0.25,
                'best_prod' => 1,
                'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium cum sit nemo inventore dolore saepe consectetur incidunt, eius eaque voluptatum?'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
