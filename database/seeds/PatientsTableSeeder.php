<?php

use Illuminate\Database\Seeder;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'last_name'     => str_random(10),
            'first_name'    => str_random(10),
            'middle_name'   => str_random(10),
            'birth_date'    => str_random(10),
            'email'         => str_random(10).'@example.com',
            'mobile_number' => str_random(10),
            'phone_number'  => str_random(10),
            'address'       => str_random(10),
            'information'   => str_random(10),
        ]);
    }
}
