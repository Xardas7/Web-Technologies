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
            // ServiceSeeder::class,
            // GroupSeeder::class,
            SizeSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            ProducerSeeder::class,
            StaticSeeder::class,
            DetailsSeeder::class,
            CommentSeeder::class
        ]);
    }
}
