<?php

use Illuminate\Database\Seeder;

class CareHomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('care_homes')->insert([
            [
                'id' => "1",
                'user_id' => "1",
                'lat' => "19.676747",
                'lng' => "-155.099217",
                'zipcode' => "96720",
                'address' => "920 Puku Street",
            ],
            [
                'id' => "2",
                'user_id' => "1",
                'lat' => "19.675111",
                'lng' => "-155.098800",
                'zipcode' => "96720",
                'address' => "980 Puku Street",
            ],
        ]); 
    }
}
