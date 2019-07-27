<?php

Route::group(['namespace' => 'Admin'],function() {

Route::group(['prefix' => 'admin'], function () {
Route::group(['middleware' => ['auth:admin']], function () {

//dashboard routs
Route::get('/', 'DashboardController@index')->name('dashboard.index');
Route::get('local/{lang?}',['as' => 'local.change', 'uses' => 'Localizationcontroller@change']);


//admin routes
Route::get('create','ProfileController@CreateAdmin')->name('admin.create');
Route::post('store','ProfileController@StoreAdmin')->name('admin.store');
Route::get('/all','ProfileController@index')->name('admin.index');
Route::get('/edit/{id}','ProfileController@edit')->name('admin.edit');
Route::put('/update/{id}','ProfileController@update')->name('admin.update');
Route::post('/delete/{id?}','ProfileController@destroy')->name('admin.destroy');

 // Logout
Route::get('logout','AdminController@logout')->name('logout');
});

 //login routes
Route::get('login','AdminController@index')->name('admin.login');
Route::post('login','AdminController@store')->name('login.store');   
});
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



