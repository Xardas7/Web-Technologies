<?php

use App\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Factory;

class DetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materials = ['cotton','wool','leather','silk','cashmere','denim','lace','linen','polyester','viscose','satin'];
        $faker = Factory::create();
        $products = Product::all();
        foreach($products as $product){
            $product->details()->create([
                'material' => $materials[array_rand($materials)],
                'quantity' => $faker->numberBetween($min = 0, $max = 100)
            ]);
        }
    }
}
