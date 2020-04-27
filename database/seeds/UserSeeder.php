<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(User::class, 50)
         ->create()
         ->each(function ($user){
             $user->cards()->createMany(factory(App\Card::class,2)->make()->toArray());
             $user->addresses()->save(factory(App\Address::class)->make());
             $user->generalPreferences()->save(factory(App\GeneralPreferences::class)->make());
         });
    }
}
