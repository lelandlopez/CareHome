<?php

use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('states')->insert([
            [
                'id' => "1",
                'state' => "Hawaii",
            ],
            [
                'id' => "2",
                'state' => "California",
            ],
        ]); 
        
    }
}
