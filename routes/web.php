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

Route::get('/', "IndexController@loadViewAction")->name('home');

Route::post('/',"IndexController@AddtoCart");

Route::get('/detail/{id}/{url}', "DetailController@loadViewAction");

Route::post('/detail/{id}/{url}', "DetailController@AddtoCart");

Route::get('/checkout', ['uses' => "CheckoutController@loadViewAction", 'as' => 'checkout']);

Route::get("/accept/{token}/{tokendate}","CheckoutController@acceptMail");

Route::post('/checkout',"CheckoutController@getPostMethod")->name('checkout.post');

Route::get('/menu', "MenuController@loadViewAction");

Route::get('/search', "SearchController@loadViewAction");

Route::get('/food-type', "FoodtypeController@loadViewAction");

Route::get('/contact', "ContactController@contact");

Route::get("/about",function (){
   return view("about");
});



Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    // your CRUD resources and other admin routes here
    CRUD::resource('foods','Admin\FoodsCrudController')->name("foods");
    CRUD::resource('food_type','Admin\Food_typeCrudController');
    CRUD::resource('customer','Admin\CustomerCrudController');
    CRUD::resource('bill','Admin\BillsCrudController');
    CRUD::resource('bill_detail','Admin\Bill_detailCrudController');
    CRUD::resource('menu','Admin\MenuCrudController');
    CRUD::resource('menu_detail','Admin\Menu_detailCrudController');
    CRUD::resource('user-read','Admin\UserCrudController');

    Route::group(['prefix'=>'export-excel'],function (){
        Route::get('customers','Admin\CustomerCrudController@ExportExcelAction');

        Route::get('foods','Admin\FoodsCrudController@ExportExcelAction');

        Route::get('food_types','Admin\Food_typeCrudController@ExportExcelAction');

        Route::get('bills','Admin\BillsCrudController@ExportExcelAction');

        Route::get('bill_details','Admin\Bill_detailCrudController@ExportExcelAction');

        Route::get('menus','Admin\MenuCrudController@ExportExcelAction');

        Route::get('menu_details','Admin\Menu_detailCrudController@ExportExcelAction');

        Route::get('user-reads','Admin\UserCrudController@ExportExcelAction');

    });

    Route::group(['prefix'=>'import-excel'],function (){
        Route::post('customers','Admin\CustomerCrudController@ImportExcelAction');

        Route::post('foods','Admin\FoodsCrudController@ImportExcelAction');

        Route::post('food_types','Admin\Food_typeCrudController@ImportExcelAction');

        Route::post('bills','Admin\BillsCrudController@ImportExcelAction');

        Route::post('bill_details','Admin\Bill_detailCrudController@ImportExcelAction');

        Route::post('menus','Admin\MenuCrudController@ImportExcelAction');

        Route::post('menu_details','Admin\Menu_detailCrudController@ImportExcelAction');
    });
});
?>