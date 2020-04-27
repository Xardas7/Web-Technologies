<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\User::class, 50)
         ->create()
         ->each(function ($user){
             $user->cards()->save(factory(App\Card::class)->make());
             $user->addresses()->save(factory(App\Address::class)->make());
         });
    }
}
