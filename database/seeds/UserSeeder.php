<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        
        'name' => 'abc',
        'age' => 20,
        'email' => 'abc@email',
        'password' => '123abc'
    ]);
    }
}
