<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
}
