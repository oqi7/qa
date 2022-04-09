<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
        
        'title' => 'タイトル',
        'body' => '質問です。',
        'user_id' => 5,
        'solved' => 1,
        ]);
    }
}
