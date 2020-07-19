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
        
        factory(App\Producer::class,2)->create()
        ->each(function ($producer){
            $cont = 1;
            $producer->user()->associate(\App\User::find($cont++));

        });
//                ->each(function ($producer){
//                    $producer->products()->createMany(factory(App\Product::class,2)->make()->toArray());
//                    foreach($producer->products as $product){
//                        $product->detail()->associate(factory(App\Detail::class)->make());
//                        $product->images()->createMany(factory(App\Image::class,5)->make()->toArray());
//                        $product->category()
//                                ->associate(App\Category::where('name','Abbigliamento')
//                                ->where('type','Giacche e cappotti')
//                                ->where('gender','female')
//                                ->first()
//                                );
//                        $product->associate();
//                    }
//                });

                factory(App\Producer::class,2)->create()
                ->each(function ($producer){
                    $cont = 1;
                    $producer->user()->associate(\App\User::find($cont++));
        
                });
//                ->each(function ($producer){
//                    $producer->products()->createMany(factory(App\Product::class,2)->make()->toArray());
//                    foreach($producer->products as $product){
//                        $product->detail()->associate(factory(App\Detail::class)->make());
//                        $product->images()->createMany(factory(App\Image::class,5)->make()->toArray());
//                        $product->category()
//                                ->associate(App\Category::where('name','Abbigliamento')
//                                ->where('type','Gonne')
//                                ->where('gender','female')
//                                ->first()
//                            );
//                        $product->associate();
//                    }
//                });

                factory(App\Producer::class,4)->create()
                ->each(function ($producer){
                    $cont = 1;
                    $producer->user()->associate(\App\User::find($cont++));
        
                });
//                ->each(function ($producer){
//                    $producer->products()->createMany(factory(App\Product::class,2)->make()->toArray());
//                    foreach($producer->products as $product){
//                        $product->detail()->associate(factory(App\Detail::class)->make());
//                        $product->images()->createMany(factory(App\Image::class,5)->make()->toArray());
//                        $product->category()
//                                ->associate(App\Category::where('name','Abbigliamento')
//                                ->where('type','Jeans')
//                                ->where('gender','female')
//                                ->first()
//                            );
//                        $product->associate();
//
//                    }
//                });

                factory(App\Producer::class,4)->create()
                ->each(function ($producer){
                    $cont = 1;
                    $producer->user()->associate(\App\User::find($cont++));
        
                });
//                ->each(function ($producer){
//                    $producer->products()->createMany(factory(App\Product::class,2)->make()->toArray());
//                    foreach($producer->products as $product){
//                        $product->detail()->associate(factory(App\Detail::class)->make());
//                        $product->images()->createMany(factory(App\Image::class,5)->make()->toArray());
//                        $product->category()
//                                ->associate(App\Category::where('name','Abbigliamento')
//                                ->where('type','Lingerie e Intimo')
//                                ->where('gender','female')
//                                ->first()
//                            );
//                         $product->associate();
//
//                    }
//                });

                factory(App\Producer::class,4)->create()
                ->each(function ($producer){
                    $cont = 1;
                    $producer->user()->associate(\App\User::find($cont++));
        
                });
//                ->each(function ($producer){
//                    $producer->products()->createMany(factory(App\Product::class,2)->make()->toArray());
//                    foreach($producer->products as $product){
//                        $product->detail()->associate(factory(App\Detail::class)->make());
//                        $product->images()->createMany(factory(App\Image::class,5)->make()->toArray());
//                        $product->category()
//                                ->associate(App\Category::where('name','Abbigliamento')
//                                ->where('type','Felpe')
//                                ->where('gender','male')
//                                ->first()
//                            );
//                            $product->associate();
//
//                    }
//                });

                factory(App\Producer::class,4)->create()
                ->each(function ($producer){
                    $cont = 1;
                    $producer->user()->associate(\App\User::find($cont++));
        
                });
//                ->each(function ($producer){
//                    $producer->products()->createMany(factory(App\Product::class,2)->make()->toArray());
//                    foreach($producer->products as $product){
//                        $product->detail()->associate(factory(App\Detail::class)->make());
//                        $product->images()->createMany(factory(App\Image::class,5)->make()->toArray());
//                        $product->category()
//                                ->associate(App\Category::where('name','Abbigliamento')
//                                ->where('type','Giacche e cappotti')
//                                ->where('gender','male')
//                                ->first()
//                            );
//                            $product->associate();
//
//                    }
//                });

                factory(App\Producer::class,4)->create()
                ->each(function ($producer){
                    $cont = 1;
                    $producer->user()->associate(\App\User::find($cont++));
        
                });
//                ->each(function ($producer){
//                    $producer->products()->createMany(factory(App\Product::class,2)->make()->toArray());
//                    foreach($producer->products as $product){
//                        $product->detail()->save(factory(App\Detail::class)->make());
//                        $product->images()->createMany(factory(App\Image::class,5)->make()->toArray());
//                        $product->category()
//                                ->associate(App\Category::where('name','Abbigliamento')
//                                ->where('type','Pantaloni')
//                                ->where('gender','male')
//                                ->first()
//                            );
//                            $product->save();
//
//                    }
//                });

    }
}
