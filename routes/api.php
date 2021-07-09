<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});






Route::namespace('Api')->group(function () {
    
    Route::get('/search', 'RestaurantController@userWithGenres');

    Route::get('/genres', 'RestaurantController@genres');
    //Api che filtra per categoria di ristorante
    Route::get('/filterapi/{genre}', 'RestaurantController@filteredApi');

    //Api ricerca per nome di ristorante
    Route::get('/names' , 'RestaurantController@searchRestaurant');

    Route::get('/vegan' , 'RestaurantController@veganPlates');

    //Route::get('/payment/done' , 'PaymentController@apiPayment');
    //Api che mostra le statistiche degli ordini per utente
    Route::get('/user/orders', 'RestaurantController@orders');

});


