<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(App\User::class, 10)->create();
        factory(App\Patient::class, 2000)->create();
//        $this->call(PatientsTableSeeder::class);
    }
}
