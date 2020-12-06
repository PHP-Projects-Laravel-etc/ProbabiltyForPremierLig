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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/createPlan', 'App\Http\Controllers\PremierLigController@createPlan')->name('lig.createPlan');
Route::get('/teams', 'App\Http\Controllers\TeamController@index')->name('team.index');
Route::get('/matches', 'App\Http\Controllers\PremierLigController@index')->name('match.index');
Route::get('/runMatch', 'App\Http\Controllers\PremierLigController@runMatch')->name('lig.createPlan');

