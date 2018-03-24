<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $contents = factory(\App\Post::class)->times(50)->make();
        \App\Post::insert($contents->toArray());
    }
}
