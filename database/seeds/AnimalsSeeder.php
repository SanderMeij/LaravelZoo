<?php

use Illuminate\Database\Seeder;

class AnimalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $animals = array(
            array('Ant', 'Rainforest, Desert, Grassland, Rainforest, Taiga, Tundra', 1, 1),
            array('Camel', 'Desert', 1500, 500),
            array('Crocodile', 'Water', 250, 750),
            array('Elephant', 'Grassland', 2000, 3500),
            array('Fish', 'Water, Ocean', 5, 10),
            array('Fox', 'Taiga', 50, 200),
            array('Giraffe', 'Grassland', 2500, 2750),
            array('Hippo', 'Grassland', 1250, 3000),
            array('Icebear', 'Ocean, Antarctic', 1500, 2250),
            array('Lion', 'Grassland, Rainforest', 1000, 2500),
            array('Monkey', 'Rainforest', 500, 400),
            array('Panda', 'Rainforest', 750, 5000),
            array('Penguin', 'Antarctic', 250, 250),
            array('Rhino', 'Grassland', 500, 3000),
            array('Snake', 'Desert, Taiga, Tundra', 10, 150),
            array('Tiger', 'Grassland, Rainforest', 500, 3000)
        );

        foreach ($animals as $animal) {
            DB::table('animals')->insert(
                [
                    'type' => $animal[0],
                    'habitats' => $animal[1],
                    'cage_size' => $animal[2],
                    'price' => $animal[3]
                ]
            );
        }
    }
}
