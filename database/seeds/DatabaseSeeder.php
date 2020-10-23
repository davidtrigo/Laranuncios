<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(AnuncioTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
