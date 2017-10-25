<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Animal extends Model {

    /**
     * Finds all the animals that fit in a cage with the given properties.
     *
     * @param $habitat string The habitat of the cage
     * @param $cageSize integer The size of the cage
     * @return array An array of animals
     */
    static function fitting($habitat, $cageSize) {
        return static::where('habitats', 'like', '%' . $habitat . '%')
            ->where('cage_size', '<=', $cageSize)->get();
    }

    /**
     * Checks if an animal with the given propeties can fit in this cage.
     *
     * @param $habitat string The habitat of the animal
     * @param $cageSize integer The minimum size of the cage of the animal
     * @return bool True if the animal fits
     */
    public function canFit($habitat, $cageSize) {
        return (strpos($this->habitats, $habitat) !== false) &&
            $this->cage_size <= $cageSize;
    }
}
