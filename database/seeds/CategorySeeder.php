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
            'name' => 'Abbigliamento',
            'gender' => 'female',
            'type' =>'Giacche e cappotti'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'female',
            'type' => 'Gonne'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'female',
            'type' => 'Jeans'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'female',
            'type' => 'Lingerie e intimo'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'female',
            'type' => 'Maglioni e Felpe'
        ])->sizes()->sync($abbigliamento_sizes);


        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'female',
            'type' => 'Pantaloncini'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'female',
            'type' => 'Pantaloni'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'female',
            'type' => 'Pigiami e Camicie da notte'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'female',
            'type' =>'Top, T-Shirt e Bluse'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'female',
            'type' =>'Vestiti'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'female',
            'type' =>'Tutto'
        ])->sizes()->sync($abbigliamento_sizes);


        // Scarpe
        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'female',
            'type' => 'Mary Jane Basse'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'female',
            'type' =>'Scarpe basse'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'female',
            'type' => 'Scarpe col tacco'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'female',
            'type' => 'Scarpe sportive'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'female',
            'type' =>'Sneaker'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'female',
            'type' =>'Stivali'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'female',
            'type' => 'Zoccoli e sabot'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'female',
            'type' => 'Tutto'
        ])->sizes()->sync($scarpe_sizes);

        // Borse      

        factory(App\Category::class)->create([
            'name' => 'Borse',
            'gender' => 'female',
            'type' => 'Borse a mano'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Borse',
            'gender' => 'female',
            'type' =>'Borse a spalla'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Borse',
            'gender' => 'female',
            'type' => 'Borse a tracolla'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Borse',
            'gender' => 'female',
            'type' => 'Portafogli e Porta documenti'
        ]);

        // Accessori
        factory(App\Category::class)->create([
            'name' => 'Accessori',
            'gender' => 'female',
            'type' => 'Cinture'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Accessori',
            'gender' => 'female',
            'type' => 'Occhiali da sole'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Accessori',
            'gender' => 'female',
            'type' => 'Sciarpe e stole'
        ]);
        
        // Gioielli
        factory(App\Category::class)->create([
            'name' => 'Gioielli',
            'gender' => 'female',
            'type' => 'Bracciali'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Gioielli',
            'gender' => 'female',
            'type' => 'Anelli'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Gioielli',
            'gender' => 'female',
            'type' => 'Collane'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Gioielli',
            'gender' => 'female',
            'type' =>'Orecchini'
        ]);
        /* ---------------------------------- MALE ---------------------------------*/

        // Abbigliamento 
        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'male',
            'type' => 'Felpe'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'male',
            'type' => 'Giacche e cappotti'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'male',
            'type' =>'Jeans'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'male',
            'type' => 'Pantaloncini'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'male',
            'type' =>'Pantaloni'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'male',
            'type' => 'Pigiami e Abbigliamento da notte'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'male',
            'type' =>'T-Shirt, Polo e Camicie'
        ])->sizes()->sync($abbigliamento_sizes);

        factory(App\Category::class)->create([
            'name' => 'Abbigliamento',
            'gender' => 'male',
            'type' => 'Tutto'
        ])->sizes()->sync($abbigliamento_sizes);

        //Scarpe 

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'male',
            'type' =>'Mocassini'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'male',
            'type' => 'Monk Strap'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'male',
            'type' => 'Stivali'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'male',
            'type' => 'Scarpe da barca'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'male',
            'type' => 'Scarpe sportive'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'male',
            'type' => 'Scarpe stringate basse'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'male',
            'type' => 'Sneaker'
        ])->sizes()->sync($scarpe_sizes);

        factory(App\Category::class)->create([
            'name' => 'Scarpe',
            'gender' => 'male',
            'type' => 'Tutto'
        ])->sizes()->sync($scarpe_sizes);


        //Accessori 
        factory(App\Category::class)->create([
            'name' => 'Accessori',
            'gender' => 'male',
            'type' => 'Occhiali da sole'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Accessori',
            'gender' => 'male',
            'type' => 'Cinture'
        ]);
        

        // Orologi
        factory(App\Category::class)->create([
            'name' => 'Orologi',
            'gender' => 'male',
            'type' =>'Orologi analogici'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Orologi',
            'gender' => 'male',
            'type' =>'Orologi con cinturino in pelle'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Orologi',
            'gender' => 'male',
            'type' => 'Orologi con cronografo'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Orologi',
            'gender' => 'male',
            'type' => 'Orologi svizzeri e di lusso'
        ]);

        // Gioielli 
        factory(App\Category::class)->create([
            'name' => 'Gioielli',
            'gender' => 'male',
            'type' => 'Anelli'
        ]);

        // Borse

        factory(App\Category::class)->create([
            'name' => 'Borse',
            'gender' => 'male',
            'type' => 'Borse a spalla'
        ]);
        
        factory(App\Category::class)->create([
            'name' => 'Borse',
            'gender' => 'male',
            'type' => 'Borse da lavoro'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Borse',
            'gender' => 'male',
            'type' => 'Borse organizer'
        ]);
        
        factory(App\Category::class)->create([
            'name' => 'Borse',
            'gender' => 'male',
            'type' => 'Portafogli e Porta documenti'
        ]);

        factory(App\Category::class)->create([
            'name' => 'Borse',
            'gender' => 'male',
            'type' => 'Zaini'
        ]);
    }
}
