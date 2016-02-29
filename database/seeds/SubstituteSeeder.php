<?php

use Illuminate\Database\Seeder;

class SubstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('substitutes')->insert([
            [
                'user_id' => "1",
                'address' => "920 Puku street",
                'zipcode' => "96720",
                'distance' => "100",
            ],
            [
                'user_id' => "2",
                'address' => "980 Puku street",
                'zipcode' => "96720",
                'distance' => "100",
            ],
        ]); 

    }
}
