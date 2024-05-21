<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Product::create([
                'name' => $faker->unique()->word,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 100, 1000), // Random price between 100 and 1000
                'category_id' => $faker->numberBetween(1, 2), // Assuming there are 2 categories (Smartphones and Tablets)
                'stock_quantity' => $faker->numberBetween(10, 100), // Random stock quantity between 10 and 100
                'image_url' => $faker->imageUrl(),
            ]);
        }
    }
}
