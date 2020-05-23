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

//home
Route::livewire('/', 'console.login')->layout('layouts.auth');

Route::prefix('console')->group(function () {

    Route::group(['middleware' => 'auth'], function(){

        //login page
        Route::livewire('/login', 'console.login')
        ->layout('layouts.auth')->name('console.login');

        //console dashboard

    });

});
