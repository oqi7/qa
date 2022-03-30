<?php

use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            
            'comment' => '良いです。',
            'review' => 3,
            'from' => 1,
            'to' => 9
            ]);
    }
}
