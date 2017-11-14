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

Route::get('/menu', "MenuController@loadViewAction");

Route::get('/search', "SearchController@loadViewAction");

Route::get('/food-type', "FoodtypeController@loadViewAction");

Route::get('/contact', "MainController@contact");

Route::get("/about",function (){
   return view("about");
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    // your CRUD resources and other admin routes here
    CRUD::resource('foods','Admin\FoodsCrudController');
    CRUD::resource('food_type','Admin\Food_typeCrudController');
    CRUD::resource('customer','Admin\CustomerCrudController');
});

?>