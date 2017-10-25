<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zoo extends Model {

    public $timestamps = false;

    public function purchaseAnimal($costs) {
        $this->money -= $costs;
        $this->guests += $costs * 1.5;
        $this->save();
    }

    public function purchaseCage($width, $height) {
        $this->money -= $width * $height;
        $this->save();
    }
}
