<?php

use Illuminate\Database\Seeder;
use App\Size;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        $scarpe_sizes = Size::where('size','like','%EU%')->get();
        $abbigliamento_sizes = Size::whereIn('size',array('XS','S','M','L','XL','3XL'))->get();

        // Abbigliamento
        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'female',
            'type' =>'Jackets and coats'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'female',
            'type' => 'Skirts'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'female',
            'type' => 'Jeans'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'female',
            'type' => 'Lingerie and underwear'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'female',
            'type' => 'Jumpers and sweatshirts'
        ])->sizes()->sync($abbigliamento_sizes);


        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'female',
            'type' => 'Shorts'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'female',
            'type' => 'Trousers'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'female',
            'type' => 'Pyjamas'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'female',
            'type' =>'Tops, T-Shirts and blouses'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'female',
            'type' =>'Dresses'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'female',
            'type' =>'All'
        ])->sizes()->sync($abbigliamento_sizes);


        // Scarpe
        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'female',
            'type' => 'Flat Mary Janes'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'female',
            'type' =>'Flat shoes'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'female',
            'type' => 'Heeled shoes'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'female',
            'type' => 'Trainers'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'female',
            'type' =>'Sneakers'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'female',
            'type' =>'Boots'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'female',
            'type' => 'Sabots'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'female',
            'type' => 'All'
        ])->sizes()->sync($scarpe_sizes);

        // Borse

        factory(App\Category::class)->create([
            'name' => 'Bags',
            'gender' => 'female',
            'type' => 'Handbags'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Bags',
            'gender' => 'female',
            'type' =>'Shoulder bags'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Bags',
            'gender' => 'female',
            'type' => 'Tote bags'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Bags',
            'gender' => 'female',
            'type' => 'Wallets and briefcases'
        ]);

        // Accessori
        factory(App\Category::class)->create([
            'name' => 'Accessories',
            'gender' => 'female',
            'type' => 'Belts'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Accessories',
            'gender' => 'female',
            'type' => 'Sunglasses'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Accessories',
            'gender' => 'female',
            'type' => 'Scarfs'
        ]);

        // Gioielli
        factory(App\Category::class)->create([
            'name' => 'Jewellery',
            'gender' => 'female',
            'type' => 'Bracciali'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Jewellery',
            'gender' => 'female',
            'type' => 'Rings'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Jewellery',
            'gender' => 'female',
            'type' => 'Necklaces'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Jewellery',
            'gender' => 'female',
            'type' =>'Earrings'
        ]);
        /* ---------------------------------- MALE ---------------------------------*/

        // Abbigliamento
        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'male',
            'type' => 'Sweatshirts'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'male',
            'type' => 'Jackets and coats'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'male',
            'type' =>'Jeans'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'male',
            'type' => 'Shorts'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'male',
            'type' =>'Trousers'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'male',
            'type' => 'Pyjamas'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'male',
            'type' =>'T-Shirts, polos and shirts'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Clothing',
            'gender' => 'male',
            'type' => 'All'
        ])->sizes()->sync($abbigliamento_sizes);

        //Scarpe

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'male',
            'type' =>'Mocassins'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'male',
            'type' => 'Monk Straps'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'male',
            'type' => 'Boots'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'male',
            'type' => 'Boat shoes'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'male',
            'type' => 'Trainers'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'male',
            'type' => 'English shoes'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'male',
            'type' => 'Sneakers'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Shoes',
            'gender' => 'male',
            'type' => 'All'
        ])->sizes()->sync($scarpe_sizes);


        //Accessori
        factory(App\Category::class)->create([
            'name' => 'Accessories',
            'gender' => 'male',
            'type' => 'Sunglasses'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Accessories',
            'gender' => 'male',
            'type' => 'Belts'
        ]);


        // Orologi
        factory(App\Category::class)->create([
            'name' => 'Watches',
            'gender' => 'male',
            'type' =>'Analog watches'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Watches',
            'gender' => 'male',
            'type' =>'Leather strap watches'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Watches',
            'gender' => 'male',
            'type' => 'Chronograph watches'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Watches',
            'gender' => 'male',
            'type' => 'Swiss and luxury watches'
        ]);

        // Gioielli
        factory(App\Category::class)->create([
            'name' => 'Jewellery',
            'gender' => 'male',
            'type' => 'Rings'
        ]);

        // Borse

        factory(App\Category::class)->create([
            'name' => 'Bags',
            'gender' => 'male',
            'type' => 'Shoulder bags'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Bags',
            'gender' => 'male',
            'type' => 'Work bags'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Bags',
            'gender' => 'male',
            'type' => 'Bag organizers'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Bags',
            'gender' => 'male',
            'type' => 'Wallets and briefcases'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Bags',
            'gender' => 'male',
            'type' => 'Backpack'
        ]);
    }
}
