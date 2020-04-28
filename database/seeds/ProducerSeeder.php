<?php

use Illuminate\Database\Seeder;

class ProducerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Producer::class,20)->create()
                ->each(function ($producer){
                    $producer->products()->createMany(factory(App\Product::class,2)->make()->toArray());
                    foreach($producer->products as $product){
                        $product->images()->createMany(factory(App\Image::class,5)->make()->toArray());
                    }
                });
                
    }
}
