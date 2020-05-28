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

    //login page
    Route::livewire('/login', 'console.login')
    ->layout('layouts.auth')->name('console.login');

Route::prefix('console')->group(function () {

    Route::group(['middleware' => 'auth'], function(){

        //logout page
        Route::livewire('/logout', 'console.logout')
        ->layout('layouts.console')->name('console.logout');

        //console dashboard
        Route::livewire('/dashboard', 'console.dashboard.index')
        ->layout('layouts.console')->name('console.dashboard.index');

        //console users
        Route::livewire('/users', 'console.users.index')
        ->layout('layouts.console')->name('console.users.index');

        Route::livewire('/users/create', 'console.users.create')
        ->layout('layouts.console')->name('console.users.create');

        Route::livewire('/users/edit/{id}', 'console.users.edit')
        ->layout('layouts.console')->name('console.users.edit');

        //console tags
        Route::livewire('/tags', 'console.tags.index')
        ->layout('layouts.console')->name('console.tags.index');

        Route::livewire('/tags/create', 'console.tags.create')
        ->layout('layouts.console')->name('console.tags.create');

        Route::livewire('/tags/edit/{id}', 'console.tags.edit')
        ->layout('layouts.console')->name('console.tags.edit');

        //console categories
        Route::livewire('/categories', 'console.categories.index')
        ->layout('layouts.console')->name('console.categories.index');

        Route::livewire('/categories/create', 'console.categories.create')
        ->layout('layouts.console')->name('console.categories.create');

        Route::livewire('/categories/edit/{id}', 'console.categories.edit')
        ->layout('layouts.console')->name('console.categories.edit');      
        
        //console vouchers
        Route::livewire('/vouchers', 'console.vouchers.index')
        ->layout('layouts.console')->name('console.vouchers.index');

        Route::livewire('/vouchers/create', 'console.vouchers.create')
        ->layout('layouts.console')->name('console.vouchers.create');

        Route::livewire('/vouchers/edit/{id}', 'console.vouchers.edit')
        ->layout('layouts.console')->name('console.vouchers.edit');

        //console pages
        Route::livewire('/pages', 'console.pages.index')
        ->layout('layouts.console')->name('console.pages.index');

        Route::livewire('/pages/create', 'console.pages.create')
        ->layout('layouts.console')->name('console.pages.create');

        Route::livewire('/pages/edit/{id}', 'console.pages.edit')
        ->layout('layouts.console')->name('console.pages.edit');

        //console sliders
        Route::livewire('/sliders', 'console.sliders.index')
        ->layout('layouts.console')->name('console.sliders.index');

        Route::livewire('/sliders/create', 'console.sliders.create')
        ->layout('layouts.console')->name('console.sliders.create');

        Route::livewire('/sliders/edit/{id}', 'console.sliders.edit')
        ->layout('layouts.console')->name('console.sliders.edit'); 

        //console settings
        Route::livewire('/settings', 'console.settings.index')
        ->layout('layouts.console')->name('console.settings.index');

    });

});

View::composer('*', function($view) {
    $setting = \App\Setting::find(1);
    $view->with('setting', $setting);
});