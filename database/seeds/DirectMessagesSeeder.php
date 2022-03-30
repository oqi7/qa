<?php

use Illuminate\Database\Seeder;

class DirectMessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('directmessages')->insert([
            
            'post_id' => 5,
            'questioner' => 3,
            'answerer' => 8,
            'public' => 1,
            'closed' => 1
        ]);
    }
}
