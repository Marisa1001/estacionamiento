<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        //llamada a los seeders este es el seeder principal
        $this->call([
           ClienteSeeder::class,
            AutoSeeder::class,
            UserSeeder::class,
            LogSeeder::class,
//            ClienteSeeder::class,
        ]);
    }
}
