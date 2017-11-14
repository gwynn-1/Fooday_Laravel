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
        }
        else{
            return view("search");
        }
    }
}
