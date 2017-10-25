<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Cage extends Model {

    public $timestamps = false;

    /**
     * Gets the animals in the cage.
     */
    public function getAnimals() {
        return OwnedAnimal::where('type', $this->animal_type)->get();
    }

    /**
     * Determines which animals can fit in the current cages and sets those to true.
     * @return array An array where the keys are the animals and
     *          the value is a boolean that is true
     *          if the animal can fit in one of the cages
     */
    public static function fitting() {
        $animals = Animal::all();
        $cages = static::all();
        $fitting = array();
        foreach ($animals as $animal) {
            $fitting[$animal->type] = false;
            foreach ($cages as $cage) {
                if ($cage->canFit($animal)) {
                    $fitting[$animal->type] = true;
                    break;
                }
            }
        }

        return $fitting;
    }

    /**
     * Determines if the given animal can fit in this cage.
     *
     * @param $animal Animal The animal
     * @return bool True if the animal can fit in this cage.
     */
    public function canFit($animal){
        if ($this->animal_type === null) {
            return $animal->canFit($this->habitat, $this->width * $this->height);
        } else {
            return $this->animal_type === $animal->type;
        }
    }

    /**
     * Sets the type of animal that is placed in this cage.
     *
     * @param $type string the type of animal
     */
    public function setType($type) {
        $this->animal_type = $type;
        $this->save();
    }

}
