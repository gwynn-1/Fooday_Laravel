<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function loadViewAction(Request $res){
        if($res->ajax()){
            $id_menu = $_GET["idmenu"];
            $defaultDetailMenuFood = DB::table("menu_detail")
                ->join("foods","foods.id","=","menu_detail.id_food")
                ->where("id_menu",$id_menu)->get();
            $defaultDetailMenu = DB::table("menu")->select("name","image")->where("id",$id_menu)->get();
            return view("Ajax.ajax_detailmenu",["def_detailmenu_food"=>$defaultDetailMenuFood,"def_detailmenu" => $defaultDetailMenu]);
        }
        else{
            $menu = DB::table("menu")->get();
            $defaultDetailMenuFood = DB::table("menu_detail")
                                ->join("foods","foods.id","=","menu_detail.id_food")
                                ->where("id_menu",1)->get();
            $defaultDetailMenu = DB::table("menu")->select("name","image")->where("id",1)->get();
            return view("menu",["menu"=>$menu,"def_detailmenu_food"=>$defaultDetailMenuFood,"def_detailmenu" => $defaultDetailMenu ]);
        }
    }
}
