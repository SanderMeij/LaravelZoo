<?php

use Illuminate\Database\Seeder;

class ZoosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zoos')->insert([
            'money' => 10000,
            'guests' => 0
        ]);
    }
}
