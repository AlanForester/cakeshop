<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Magick',
            'slug' => 'magick',
            'description' => 'description goes here',
            'price' => 399.99,
            'image' => '1.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Sweet sun',
            'slug' => 'sweet-sun',
            'description' => 'description goes here',
            'price' => 449.99,
            'image' => '2.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Apple Pie',
            'slug' => 'apple-pie',
            'description' => 'description goes here',
            'price' => 2299.99,
            'image' => '3.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Cheese Cake',
            'slug' => 'cheese',
            'description' => 'description goes here',
            'price' => 799.99,
            'image' => '4.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Good Cake',
            'slug' => 'good-cake',
            'description' => 'description goes here',
            'price' => 699.99,
            'image' => '5.jpg',
        ]);
        DB::table('products')->insert([
            'name' => 'Berry',
            'slug' => 'berry',
            'description' => 'description goes here',
            'price' => 899.99,
            'image' => '6.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Big cake',
            'slug' => 'big-cake',
            'description' => 'description goes here',
            'price' => 99.99,
            'image' => '7.jpg',
        ]);

        DB::table('products')->insert([
            'name' => 'Coca cake',
            'slug' => 'coca-cake',
            'description' => 'description goes here',
            'price' => 499.99,
            'image' => '8.jpg',
        ]);
    }
}
