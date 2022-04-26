<?php

use Illuminate\Database\Seeder;
use App\Teach;

class TeachesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 2; $i <= 10; $i++) {
            Teach::create([
                'user_id' => 1,
                'post_id' => $i
            ]);
        }
    }
}
