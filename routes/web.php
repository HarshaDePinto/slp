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

Route::get('/new', function () {
    return view('newuser');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Users Rote Only For Admin
Route::resource('users', 'AdminUsersController');

Route::post('users/{user}/makeActive', 'AdminUsersController@makeActive')->name('users.makeActive');

Route::post('users/{user}/makeInactive', 'AdminUsersController@makeInactive')->name('users.makeInactive');

Route::get('users/{user}/changePassword', 'AdminUsersController@changePassword')->name('users.changePassword');

Route::put('users/{user}/editlogin', 'AdminUsersController@editlogin')->name('users.editlogin');

Route::put('users/{user}/restore', 'AdminUsersController@restore')->name('user.restore');


//vehicle

Route::resource('vehicles', 'VehiclesController');


Route::post('vehicles/{vehicle}/makeUnavailable', 'VehiclesController@makeUnavailable')->name('vehicles.makeUnavailable');

Route::post('vehicles/{vehicle}/makeAvailable', 'VehiclesController@makeAvailable')->name('vehicles.makeAvailable');





//tour
Route::resource('tours', 'TourController');

Route::post('tours/{tour}/makeConfirm', 'TourController@makeConfirm')->name('tours.makeConfirm');

Route::post('tours/{tour}/makePending', 'TourController@makePending')->name('tours.makePending');

Route::get('tours/{tour}/manage', 'TourController@manage')->name('tour.manage');

Route::get('tours/{tour}/locations', 'TourController@locations')->name('tour.locations');

Route::get('tours/{tour}/fuels', 'TourController@fuels')->name('tour.fuels');
Route::get('tours/{tour}/maintenances', 'TourController@maintenances')->name('tour.maintenances');

Route::get('tours/{tour}/activities', 'TourController@activities')->name('tour.activities');

Route::get('tours/{tour}/shops', 'TourController@shops')->name('tour.shops');

Route::get('tours/{tour}/other', 'TourController@other')->name('tour.other');

Route::get('tours/{tour}/salary', 'TourController@salary')->name('tour.salary');

Route::get('tours/{tour}/summary', 'TourController@summary')->name('tour.summary');

Route::put('tours/{tour}/restore', 'TourController@restore')->name('tour.restore');

Route::put('tours/{tour}/summery', 'TourController@summery')->name('tour.summery');

Route::get('/downloadPDF/{id}', 'TourController@downloadPDF');

//agreements
Route::resource('agreement', 'AgreementController');


//Instructions

Route::resource('instructions', 'InstructionController');

//Locations

Route::resource('locations', 'LocationsController');

//Fuel

Route::resource('fuels', 'FuelsController');

//Maintenance

Route::resource('maintenances', 'MaintenancesController');

//Activities

Route::resource('activities', 'ActivityController');

//Shops

Route::resource('shops', 'ShopsController');


//Salary
Route::resource('salaries', 'SalaryController');

//Expenses
Route::resource('expenses', 'ExpensesController');
