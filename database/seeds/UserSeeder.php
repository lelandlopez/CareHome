<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => "1",
                'name' => "leland lopez",
                'email' => "lelandlopez@gmail.com",
                'password' => bcrypt("waiakea2009"),
            ],
            [
                'id' => "2",
                'name' => "shelby ferrer",
                'email' => "shelbyferrer@gmail.com",
                'password' => bcrypt("waiakea2009"),
            ],
        ]); 
    }
}
