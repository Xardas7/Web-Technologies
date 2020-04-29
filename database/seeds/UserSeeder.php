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
         factory(User::class, 30)
         ->create()
         ->each(function ($user){
             $user->cards()->createMany(factory(App\Card::class,2)->make()->toArray());
             $user->addresses()->save(factory(App\Address::class)->make());
             $user->ShoppingCart()->save(factory(App\ShoppingCart::class)->make());
             $user->generalPreferences()->save(factory(App\GeneralPreferences::class)->make());
             $user->groups()->sync([
                 App\Group::where('name','buyer')->first()->id
             ]);
         });

         factory(User::class, 15)
         ->create()
         ->each(function ($user){
             $user->cards()->createMany(factory(App\Card::class,2)->make()->toArray());
             $user->addresses()->save(factory(App\Address::class)->make());
             $user->generalPreferences()->save(factory(App\GeneralPreferences::class)->make());
             $user->groups()->sync([
                 App\Group::where('name','seller')->first()->id
             ]);
         });
         
         factory(User::class, 5)
         ->create()
         ->each(function ($user){
             $user->cards()->createMany(factory(App\Card::class,2)->make()->toArray());
             $user->addresses()->save(factory(App\Address::class)->make());
             $user->generalPreferences()->save(factory(App\GeneralPreferences::class)->make());
             $user->groups()->sync([
                 App\Group::where('name','admin')->first()->id
             ]);
         });
    }
}
