<?php
/**
 * Created by PhpStorm.
 * User: Huy
 * Date: 11/7/2017
 * Time: 10:22 AM
 */

CRUD::resource('foods','FoodsCrudController');
CRUD::resource('food_type','Food_typeCrudController');
CRUD::resource('customer','CustomerCrudController');
CRUD::resource('bill','BillsCrudController');
CRUD::resource('bill_detail','Bill_detailCrudController');
CRUD::resource('menu','MenuCrudController');
CRUD::resource('menu_detail','Menu_detailCrudController');
?>