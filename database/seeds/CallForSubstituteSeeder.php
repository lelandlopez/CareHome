<?php

use Illuminate\Database\Seeder;

class CallForSubstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('calls_for_substitute')->insert([
            [
                'user_id' => "1",
                'care_home_id' => "1",
                'start_date' => "1/23/1234",
                'start_time' => "1 0 0",
                'end_date' => "1/23/1234",
                'end_time' => "1 0 0",
            ],
            [
                'user_id' => "1",
                'care_home_id' => "1",
                'start_date' => "1/23/1234",
                'start_time' => "1 0 0",
                'end_date' => "1/23/1234",
                'end_time' => "1 0 0",            ],
        ]); 
    }
}
