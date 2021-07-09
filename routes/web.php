<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route::get('/', function () {
    //return view('welcome');
//});

// Sezione pubblica
//Homepage 
Route::get('/', 'Guest\BooleatController@index')->name('guest.index');
//Route per vedere i piatti del ristoratore
Route::get('/show/{user}', 'Guest\BooleatController@show')->name('guest.show');
//Route per mostrare il checkout all'utente
Route::get('/show/{user}/checkout', 'Guest\OrderController@formOrder')->name('guest.checkout');
//Route per salvare l'ordine effettuato dal guest
Route::post('restaurant/checkout', 'Guest\OrderController@storePayment')->name('guest.checkout.store');

// Autenticazione
Auth::routes();

// Rotte Admin
Route::get('/admin/home', 'HomeController@index')->name('home');

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function () {
   //Crud Plates
   Route::resource('plates', 'PlateController');
   //Crud User
   Route::resource('user', 'UserController');
});
//Route staatistiche admin
Route::get('/orders/{user}', 'OrderController@orders')->name('orders.index');
