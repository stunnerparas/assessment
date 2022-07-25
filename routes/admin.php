<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Eventcontroller;



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

//Route for CRUD of Event
Route::get('/event','EventController@index')->name('admin.event.index')->middleware('is_admin');
Route::post('storeEvent/','EventController@store');
Route::get('/event/edit/{id}','EventController@show');
Route::post('/updateEvent/{id}','EventController@update');
Route::delete('event/{id}', 'EventController@destroy')->name('event.destroy');






