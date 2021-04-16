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

$aRoutes = ['/', '/top/confirmed'];
foreach($aRoutes as $aRoute) {
    Route::get($aRoute, function () {
        return view('welcome');
    });
}

Route::get('/init', 'App\Covid\Controllers\CovidController@initializeData');
Route::get('/get/top/confirmed', 'App\Covid\Controllers\CovidController@getTopConfirmedCases');