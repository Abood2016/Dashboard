<?php

Route::group(['namespace' => 'Admin'],function() {

Route::group(['prefix' => 'admin'], function () {
Route::group(['middleware' => ['auth:admin']], function () {
//dashboard routs
Route::get('/', 'DashboardController@index')->name('index.dashboard');
Route::get('local/{lang?}',['as' => 'local.change', 'uses' => 'Localizationcontroller@change']);

//product routs
Route::group(['prefix' => 'product'],function(){
Route::get('create','ProductController@create')->name('product.create');
Route::post('store','ProductController@store')->name('product.store');
Route::get('/','ProductController@index')->name('product.index');
Route::get('edit/{id}','ProductController@edit')->name('product.edit');
Route::put('update/{id}','ProductController@update')->name('product.update');
Route::post('delete/{id?}','ProductController@destroy')->name('product.destroy');
Route::get('show/{id}','ProductController@show')->name('product.show');

});

//Categoty routs
Route::group(['prefix' => 'category'],function(){
Route::get('create','CategoryController@create')->name('category.create');
Route::post('store','CategoryController@store')->name('category.store');
Route::get('/','CategoryController@index')->name('category.index');
Route::get('edit/{id}','CategoryController@edit')->name('category.edit');
Route::put('update/{id}','CategoryController@update')->name('category.update');
Route::post('delete/{id?}','CategoryController@destroy')->name('category.destroy');

});

//Color routs
Route::group(['prefix' => 'color'],function(){
Route::get('create','ColorController@create')->name('color.create');
Route::post('store','ColorController@store')->name('color.store');
Route::get('/','ColorController@index')->name('color.index');
Route::get('edit/{id}','ColorController@edit')->name('color.edit');
Route::put('update/{id}','ColorController@update')->name('color.update');
Route::post('delete/{id?}','ColorController@destroy')->name('color.destroy');

});

//size routs
Route::group(['prefix' => 'size'],function(){
Route::get('create','SizeController@create')->name('size.create');
Route::post('store','SizeController@store')->name('size.store');
Route::get('/','SizeController@index')->name('size.index');
Route::get('edit/{id}','SizeController@edit')->name('size.edit');
Route::put('update/{id}','SizeController@update')->name('size.update');
Route::post('delete/{id?}','SizeController@destroy')->name('size.destroy');

});

//Profile routs
Route::group(['prefix' => 'Profile'],function(){
Route::get('/','ProfileController@index')->name('profile.index');
Route::get('edit/{id}','ProfileController@edit')->name('profile.edit');
Route::put('update/{id?}','ProfileController@update')->name('profile.update');

});

//Profile routs
Route::group(['prefix' => 'Orders'] , function(){
Route::get('/confirm/{id}','OrderController@confirm')->name('order.confirm');    
Route::get('/pending/{id}','OrderController@pending')->name('order.pending');    
Route::get('/show/{id}','OrderController@show')->name('order.show');    
Route::get('/','OrderController@index')->name('order.index');
});



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



