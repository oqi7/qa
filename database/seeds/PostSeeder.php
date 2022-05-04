<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Post::create([
                'user_id'    => $i,
                'title'      => 'タイトル' .$i,
                'body'       => 'テスト投稿' .$i,
                'solved'    => '1',
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
