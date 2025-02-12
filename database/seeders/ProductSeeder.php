<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Milk',
                'description' => 'Free range cow`s milk'
            ],
            [
                'name' => 'Chocolate',
                'description' => 'Chocolate from the Congo'
            ],
            [
                'name' => 'Honey Cereals',
                'description' => 'Cereals rich in honey from free-range bees'
            ],
            [
                'name' => 'Bread',
                'description' => 'Homemade morning bread'
            ],
            [
                'name' => 'Water Bottle',
                'description' => 'Everest water bottle'
            ],
        ];

        foreach($products as $product){
            Product::create($product);
        }
    }
}
