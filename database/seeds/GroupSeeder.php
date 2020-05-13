<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Group::class)->create([
            'name' => 'admin'
        ])->services()->sync([
           App\Service::where('permission','all')->first()->id
        ]);

        
       factory(Group::class)->create([
            'name' => 'buyer'
        ])->services()->sync([
            App\Service::where('permission','can buy')->first()->id,
            App\Service::where('permission','can comment')->first()->id,
            App\Service::where('permission','can vote')->first()->id
        ]);

       factory(Group::class)->create([
            'name' => 'seller'
        ])->services()->sync([
            App\Service::where('permission','can sell')->first()->id,
            App\Service::where('permission','can comment')->first()->id
        ]);

    }
}
