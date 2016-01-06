<?php

use Illuminate\Database\Seeder;

class CareHomeRoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('care_home_rooms')->insert([
            [
                'id' => "1",
                'care_home_id' => "1",
                'square_footage' => "20000",
                'available' => "1",
            ],
        ]); 
    }
}
