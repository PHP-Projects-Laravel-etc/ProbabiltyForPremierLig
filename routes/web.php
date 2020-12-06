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

Route::get('/', 'App\Http\Controllers\TeamController@index')->name('team.index');
Route::get('/teams', 'App\Http\Controllers\TeamController@index')->name('team.index');


Route::get('/createPlan', 'App\Http\Controllers\PremierLigController@createPlan')->name('plan.create');
Route::get('/matches/{week?}', 'App\Http\Controllers\PremierLigController@getWeeksMatch')->name('match.index');
Route::get('/runMatch/{week}', 'App\Http\Controllers\PremierLigController@runMatch')->name('match.run');
Route::get('/runSimulation', 'App\Http\Controllers\PremierLigController@runSimulation')->name('match.simulation');

