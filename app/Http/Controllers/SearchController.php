<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    //
    public function loadViewAction(Request $res){
        if($res->ajax()){
            $data = $_GET["search"];
            $food_result = [];
            if(strlen($data)>0) {
                $name_result = DB::table("foods")->where("foods.name", "like", '%' . $data . '%');
                $food_result = DB::table("foods")->where("price","like","%".$data."%")->union($name_result)->get();
            }
            return view("Ajax.ajax_search",["food_result"=>$food_result]);
        }
        else{
            return view("search");
        }
    }
}
