<?php

use Illuminate\Database\Seeder;

class HabitatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $habitats = array(
            'Antarctic',
            'Desert',
            'Grassland',
            'Ocean',
            'Rainforest',
            'Taiga',
            'Tundra',
            'Water'
        );

        foreach ($habitats as $habitat) {
            DB::table('habitats')->insert([
                'name' => $habitat
            ]);
        }

    }
}
