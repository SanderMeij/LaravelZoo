<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OwnedAnimal extends Model {

    public $timestamps = false;

    /**
     * OwnedAnimal constructor.
     */
    public function construct($type, $name, $male, $cageId) {
        $this->type = $type;
        $this->name = $name;
        $this->male = $male;
        $this->cage_id  = $cageId;
    }

}
