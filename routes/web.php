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

Route::get('/', "IndexController@loadViewAction")->name('abc');

Route::get('/detail/{id}/{url}', "DetailController@loadViewAction");

Route::get('/checkout', "MainController@checkout");

Route::get('/menu', "MainController@menu");

Route::get('/search', "MainController@search");

Route::get('/food-type', "MainController@foodType");

Route::get('/contact', "MainController@contact");

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    // your CRUD resources and other admin routes here
    CRUD::resource('foods','Admin\FoodsCrudController');
    CRUD::resource('food_type','Admin\Food_typeCrudController');
    CRUD::resource('customer','Admin\CustomerCrudController');
});

?>