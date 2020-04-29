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
        $this->call([
            ServiceSeeder::class,
            GroupSeeder::class,
            CategorySeeder::class,
            ProducerSeeder::class,
            UserSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
