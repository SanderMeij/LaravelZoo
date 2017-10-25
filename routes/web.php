<?php

use App\Animal;
use App\Cage;
use App\Habitat;
use App\OwnedAnimal;

Route::get('/', function () {
    $cages = Cage::all();
    $owned = OwnedAnimal::all();
    return view('zoo', compact('cages'), compact('owned'));
});

Route::get('shop', 'ShopController@shop');

Route::get('shop/animals', 'ShopController@animals');

Route::get('shop/animals/{type}', 'ShopController@animal');

Route::get('shop/animals/buy/{type}', 'ShopController@buyAnimal');

Route::get('shop/cages/{habitat?}/{width?}/{height?}', 'ShopController@cages');

Route::post('shop/cages', 'ShopController@buyCage');