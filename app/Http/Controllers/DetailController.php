<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\foodsModel;
use App\pageurlModel;

class DetailController extends Controller
{
    //

    public function loadViewAction($id){
        $foodDetail = foodsModel::find($id);
        $relatedFoods = DB::table('foods')
                        ->join("pageurl","foods.id_url","=","pageurl.id")
                        ->where("foods.id_type",$foodDetail->id_type)
                        ->where("foods.id","<>",$foodDetail->id)->get();
        return view("detail",["foodDetail"=>$foodDetail,"relatedFoods"=>$relatedFoods]);
    }

    public function AddtoCart(Request $req){
        $id = $req->id;
        $quantity = $req->soluong;
        $arr = DB::table("foods")->select("name","price")->where("id",$id)->get();
        Cart::add($id,$arr[0]->name,$quantity,$arr[0]->price);
//        dd($arr);
        return $arr[0]->name;
    }
}
