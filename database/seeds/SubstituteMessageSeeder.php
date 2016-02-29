<?php

use Illuminate\Database\Seeder;

class SubstituteMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('substitute_messages')->insert([
            [
                'user_id' => "1",
                'substitute_user_id' => "2",
                'title' => "title",
                'message' => "message",
            ],
        ]); 

    }
}
