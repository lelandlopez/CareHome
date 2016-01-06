<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
                'id' => "1",
                'state_id' => "1",
                'city' => "Honolulu",
                'zipcode' => "96801",
            ],
            [
                'id' => "2",
                'state_id' => "1",
                'city' => "Hilo",
                'zipcode' => "96720",
            ],
        ]); 
    }
}
