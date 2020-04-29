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
            'product_id' => 1,
            'vote' => 'two'
        ]);
        factory(App\Comment::class)->create([
            'user_id' => 1,
            'product_id' => 2,
            'vote' => 'five'
        ]);
        factory(App\Comment::class)->create([
            'user_id' => 1,
            'product_id' => 3,
            'vote' => 'three'
        ]);

        factory(App\Comment::class)->create([
            'user_id' => 2,
            'product_id' => 1,
            'vote' => 'four'
        ]);

        factory(App\Comment::class)->create([
            'user_id' => 2,
            'product_id' => 2,
            'vote' => 'one'
        ]);

        factory(App\Comment::class)->create([
            'user_id' => 2,
            'product_id' => 2,
            'vote' => 'four'
        ]);

        factory(App\Comment::class)->create([
            'user_id' => 4,
            'product_id' => 1,
            'vote' => 'four'
        ]);
    }
}
