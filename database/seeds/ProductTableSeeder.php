<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            [
                'product_name' => 'Product 1',
                'product_code' => 'Pr_1',
                'description' => 'Product description',
                'price' => '10.00',
                'image' => 'product_1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Product 2',
                'product_code' => 'Pr_2',
                'description' => 'Product description',
                'price' => '20.00',
                'image' => 'product_2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Product 3',
                'product_code' => 'Pr_3',
                'description' => 'Product description',
                'price' => '30.00',
                'image' => 'product_2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Product 4',
                'product_code' => 'Pr_4',
                'description' => 'Product description',
                'price' => '30.00',
                'image' => 'product_1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Product 5',
                'product_code' => 'Pr_5',
                'description' => 'Product description',
                'price' => '30.00',
                'image' => 'product_1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Product 6',
                'product_code' => 'Pr_6',
                'description' => 'Product description',
                'price' => '30.00',
                'image' => 'product_2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_name' => 'Product 7',
                'product_code' => 'Pr_7',
                'description' => 'Product description',
                'price' => '30.00',
                'image' => 'product_1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
