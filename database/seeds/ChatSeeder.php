<?php

use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chats')->insert([
            
            'post_id' => 1,
            'message' => 'hello',
            'questioner' => 1,
            'answerer' => 2,
            'public' => 1,
            'closed' => 1
        ]);
    }
}
