<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FoodtypeController extends Controller
{
    //
    public function loadViewAction(Request $res){
        if($res->ajax()){
            $id = $_GET["id"];
            $default_ft = DB::table("foods")->join("pageurl","foods.id_url","=","pageurl.id")->where("id_type",$id)->get();
            return view("Ajax.ajax_foodtype",["default_ft"=>$default_ft]);
        }
        else{
            $foodtype = DB::table("food_type")->get();
            $default_ft = DB::table("foods")->join("pageurl","foods.id_url","=","pageurl.id")->where("id_type",1)->get();
            return view("food-type",["foodtype"=>$foodtype,"default_ft"=>$default_ft]);
        }
    }
}
