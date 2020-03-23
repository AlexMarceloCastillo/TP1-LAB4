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
        factory(App\Empresa::class,10)->create();
        factory(App\Noticia::class,10)->create();
    }
}
