<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comment::class)->create([
            'user_id' => 1,
            'product_id' => 1
        ]);
        factory(App\Comment::class)->create([
            'user_id' => 1,
            'product_id' => 2
        ]);
        factory(App\Comment::class)->create([
            'user_id' => 1,
            'product_id' => 3
        ]);

        factory(App\Comment::class)->create([
            'user_id' => 2,
            'product_id' => 1
        ]);

        factory(App\Comment::class)->create([
            'user_id' => 2,
            'product_id' => 2
        ]);

        factory(App\Comment::class)->create([
            'user_id' => 2,
            'product_id' => 2
        ]);

        factory(App\Comment::class)->create([
            'user_id' => 4,
            'product_id' => 1
        ]);
    }
}
