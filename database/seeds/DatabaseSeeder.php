<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PostSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ChatSeeder::class);
        $this->call(ReviewsSeeder::class);
        $this->call(LikesSeeder::class);
        $this->call(TeachesSeeder::class);
    }
}
