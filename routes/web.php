<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Users Rote Only For Admin
Route::resource('users', 'AdminUsersController');

Route::post('users/{user}/makeActive', 'AdminUsersController@makeActive')->name('users.makeActive');

Route::post('users/{user}/makeInactive', 'AdminUsersController@makeInactive')->name('users.makeInactive');

Route::get('users/{user}/changePassword', 'AdminUsersController@changePassword')->name('users.changePassword');

Route::put('users/{user}/editlogin', 'AdminUsersController@editlogin')->name('users.editlogin');


//vehicle

Route::resource('vehicles', 'VehiclesController');


Route::post('vehicles/{vehicle}/makeUnavailable', 'VehiclesController@makeUnavailable')->name('vehicles.makeUnavailable');

Route::post('vehicles/{vehicle}/makeAvailable', 'VehiclesController@makeAvailable')->name('vehicles.makeAvailable');





//tour
Route::resource('tours', 'TourController');

Route::post('tours/{tour}/makeConfirm', 'TourController@makeConfirm')->name('tours.makeConfirm');

Route::post('tours/{tour}/makePending', 'TourController@makePending')->name('tours.makePending');

//agreements
Route::resource('agreement', 'AgreementController');
