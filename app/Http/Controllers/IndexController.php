<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadViewAction(Request $res){

        if($res->ajax()){
            $paging = DB::table("foods")->join("pageurl","foods.id_url","=","pageurl.id")->paginate(6);
            return view("Pagination.ajax-paging-index",["foodpaging"=>$paging]);
        }
        else{
            $foodsToday = DB::table("foods")
                ->join("pageurl","foods.id_url","=","pageurl.id")
                ->where("foods.today",1)->get();
            $paging = DB::table("foods")->join("pageurl","foods.id_url","=","pageurl.id")->paginate(6);
            return view("index",["foodstoday"=>$foodsToday,"foodpaging"=> $paging]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
