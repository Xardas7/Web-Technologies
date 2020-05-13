<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Service::class)->create([
            'permission' => 'can write'
        ]);

        factory(Service::class)->create([
            'permission' => 'can read'
        ]);

        factory(Service::class)->create([
            'permission' => 'can sell'
        ]);

        factory(Service::class)->create([
            'permission' => 'can vote'
        ]);

        factory(Service::class)->create([
            'permission' => 'can comment'
        ]);

        factory(Service::class)->create([
            'permission' => 'can buy'
        ]);

        factory(Service::class)->create([
            'permission' => 'all'
        ]);
    }
}
