<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foodsModel;

class MainController extends Controller
{


    public function detail($id){
        return view("detail",["id"=>$id]);
    }

    public function checkout(){
        return view("checkout");
    }

    public function menu(){
        return view("menu");
    }

    public function search(){
        return view("search");
    }

    public function foodType(){
        return view("food-type");
    }

    public function contact(){
        return view("contact");
    }
}
