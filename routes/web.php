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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
/*custom logout rout get request*/
Route::get('/logout', 'Auth\LoginController@logout', function () {
    return abort(404);
})->name('logout');
Route::resource('pages', 'PageController');
Route::resource('roles', 'RoleController');
Route::resource('users', 'UserController');
