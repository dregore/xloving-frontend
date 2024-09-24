<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/tasks', 'TaskController@index')->name('tasks');
Route::get('/tasks/create', 'TaskController@create')->name('tasks.create');
Route::post('/tasks/create', 'TaskController@store')->name('tasks.store');

// Route::get('/units', 'UnitController@index')->name('units.index');
// Route::get('/units/create', 'UnitController@create')->name('units.create');
// Route::post('/units/create', 'UnitController@store')->name('units.store');
// Route::get('/units/update/{id}', 'UnitController@edit')->name('units.edit');
// Route::patch('/units/update/{id}', 'UnitController@update')->name('units.update');

Route::resource('units', UnitController::class);

Route::resource('proxies', ProxyController::class);

Route::resource('orders', OrderController::class);

Route::resource('accounts', AccountController::class);

Route::get('/about', function () {
    return view('about');
})->name('about');
