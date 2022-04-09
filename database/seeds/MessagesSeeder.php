<?php

use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            
            'message' => 'よろしくお願いします。',
            'image' => 'a',
            'user_id' => 2,
            'dm_id' => 3
        ]);
    }
}
