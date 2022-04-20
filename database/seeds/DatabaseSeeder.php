<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private const SEEDERS = [
        PostsTableSeeder::class,
    ];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PostSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MessagesSeeder::class);
        $this->call(DirectMessagesSeeder::class);
        $this->call(ReviewsSeeder::class);
        $this->call(LikesSeeder::class);
        $this->call(TeachesSeeder::class);
    }
}
