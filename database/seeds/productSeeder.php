<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create(); // factory pattern
        foreach (range(0, 10) as $index) {
            $image = $faker->image(public_path('admin_uploads'));
            $image = str_replace(public_path(), '', $image);
            Product::create([
                'name' => $faker->name,
                'price' => $faker->numberBetween(100,1500),
                'short_description' => $faker->paragraph,
                'long_description' => $faker->paragraph,
                'image' => $image,
                'category_id' =>1,
                'admin_id' => 1,
                'SKU' => $faker->isbn10,
                'color' => $faker->word,
                'slug' => $faker->name,
                'status' => $faker->randomElement(['electronic','normal']),
                'size' => $faker->numberBetween(1,50),
            ]);

        }
    }
}
