<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

use App\Animal;
use App\Cage;
use App\Habitat;
use App\OwnedAnimal;
use App\Zoo;

class ShopController extends Controller {

    /**
     * Shows the shop with the buttons of the products.
     *
     * @return View the view
     */
    public function shop() {
        return view('shop');
    }

    /**
     * Show the list of animals.
     *
     * @return View The view
     */
    public function animals() {
        $fitting = Cage::fitting();
        $animals = Animal::all();
        return view('shop.animals', compact('animals'), compact('fitting'));
    }

    /**
     * Shows the view of an animal and an option to buy the animal.
     *
     * @param $type String the type of animal, e.g. 'tiger'
     * @return View The view
     */
    public function animal($type) {
        $animal = Animal::where('type', $type)->first();
        if ($animal) {
            return view('shop.animal', compact('animal'));
        } else {
            return redirect('/shop/animals');
        }
    }

    /**
     * Finds the cage that an animal can be put in.
     *
     * @param $type string The type of animal, e.g. 'tiger'
     * @return Cage The cage the animal can fit in.
     */
    public function getAvailableCage($type) {
        $animalProperties = Animal::where('type', $type)->first();
        $cages = Cage::all();
        $result = null;
        foreach ($cages as $cage) {
            $cageType = $cage->animal_type;
            if ($cageType) {
                if ($type === $cageType) {
                    return $cage;
                }
            } else if($animalProperties->canFit($cage->habitat, $cage->width * $cage->height)) {
                $result = $cage;
            }
        }
        return $result;
    }

    /**
     * Buys the player an animal and puts in a cage.
     *
     * @param $type string The type of animal, e.g. 'tiger'
     * @return App The page the user should be redirected to
     */
    public function buyAnimal($type) {
        $zoo = Zoo::first();
        $animal = Animal::where('type', $type)->first();
        $cage = $this->getAvailableCage($type);
        if ($cage !== null) {
            $zoo->purchaseAnimal($animal->price);
            $cage->setType($type);

            $animal = new OwnedAnimal();
            $animal->construct(
                $type, "Sander", random_int(0, 1), $cage->id);
            $animal->save();
        }

        return redirect('/');
    }

    /**
     * Shows the scene where the user can compose a cage and buy the cage.
     *
     * @param string $habitat The default habitat value
     * @param int $width The default width value
     * @param int $height The default height value
     * @return View The view
     */
    public function cages($habitat = 'Antarctic', $width = 0, $height = 0) {
        $habitats = Habitat::all();
        $animals = Animal::fitting($habitat, $width * $height);
        return view('shop.cages', compact('habitat',
            'width', 'height', 'habitats', 'animals'));
    }

    /**
     * Buys the player a cage
     *
     * @return App The page the user should be redirected to
     */
    public function buyCage() {
        $cage = new Cage;
        $cage->habitat = request('habitat');
        $cage->width = request('width');
        $cage->height = request('height');
        $cage->save();

        $zoo = Zoo::first();
        $zoo->purchaseCage($cage->width, $cage->height);

        return redirect('/');
    }

}
