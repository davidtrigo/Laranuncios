<?php

use Illuminate\Database\Seeder;

class AnuncioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Anuncio::class,20)->create();
    }
}
