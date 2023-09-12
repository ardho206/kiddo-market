<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [
                'name' => 'Keyboard',
                'slug' => 'keyboard'
            ],
            [
                'name' => 'Mouse',
                'slug' => 'mouse'
            ],
            [
                'name' => 'Monitor',
                'slug' => 'monitor'
            ],
            [
                'name' => 'Console',
                'slug' => 'console'
            ],
            [
                'name' => 'Laptop',
                'slug' => 'laptop'
            ],
            [
                'name' => 'Chair',
                'slug' => 'chair'
            ],
            [
                'name' => 'Mousepad',
                'slug' => 'mousepad'
            ],
            [
                'name' => 'Table',
                'slug' => 'table'
            ],
            [
                'name' => 'Headset',
                'slug' => 'headset'
            ],
        ];

        foreach ($category as $c) {
            Category::create($c);
        }
    }
}
