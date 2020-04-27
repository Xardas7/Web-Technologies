<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,50)->create()->each(function ($user){
            $user->cards()->save(factory(App\Card::class)->make());
            $user->addresses()->save(factory(App\Address::class)->make());
        });
    }
}
