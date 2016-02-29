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
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CareHomeSeeder::class);
        $this->call(CareHomeRoomsSeeder::class);
        $this->call(SubstituteSeeder::class);
        $this->call(CallForSubstituteSeeder::class);
        $this->call(SubstituteMessageSeeder::class);
    }
}
