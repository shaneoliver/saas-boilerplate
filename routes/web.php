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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
});

Route::group(['prefix' => 'account', 'middleware' => ['auth', 'verified'], 'as' => 'account.'], function() {
    Route::get('/', 'Account\AccountController@index')->name('index');
    Route::get('/profile', 'Account\ProfileController@index')->name('profile.index');
    Route::post('/profile', 'Account\ProfileController@store')->name('profile.store');
    Route::get('/security', 'Account\SecurityController@index')->name('security.index');
    Route::post('/security', 'Account\SecurityController@store')->name('security.store');

    Route::get('/subscription', 'Billing\SubscriptionController@index')->name('billing.index');
    Route::post('/subscription', 'Billing\SubscriptionController@store')->name('billing.store');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function() {
    Route::get('/', 'Admin\AdminController@index')->name('index');
    
    // Plans
    Route::get('/plan', 'Admin\PlanController@index')->name('plan.index');
    Route::get('/plan/create', 'Admin\PlanController@create')->name('plan.create');
    Route::post('/plan', 'Admin\PlanController@store')->name('plan.store');
    Route::get('/plan/{plan}/edit', 'Admin\PlanController@edit')->name('plan.edit');
    Route::patch('/plan/{plan}', 'Admin\PlanController@update')->name('plan.update');
    Route::delete('/plan/{plan}', 'Admin\PlanController@destroy')->name('plan.destroy');
});