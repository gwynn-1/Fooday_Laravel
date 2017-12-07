<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\pageurlModel;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class foodsModel extends Model
{
    //
    protected $table = "foods";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function foodtype()
    {
        return $this->belongsTo("App\\foodtypeModel", "id_type", "id");
    }

    public function pageurl()
    {
        return $this->hasOne("App\pageurlModel", "id_url", "id");
    }

    public function getFoodsCart(){
        $arr = Cart::content();
        $arr_cartitems=[];
        $total =0;
        foreach ($arr as $key=>$item){
            $arr_cartitems[$key] = new \stdClass();
            $arr_cartitems[$key]->id = $item->id;
            $arr_cartitems[$key]->name = $item->name;
            $arr_cartitems[$key]->price = $item->price;
            $arr_cartitems[$key]->image = (DB::table("foods")->select("image")->where("id",$item->id)->get())[0]->image;
            $arr_cartitems[$key]->quantity = $item->qty;
            $total += $item->qty*$item->price;
        }
        return ["items"=>$arr_cartitems,"total"=>$total];
    }

    public function UpdateCart($id_row,$qty){
        Cart::update($id_row,$qty);
    }

    public function DeleteCart($id_row){
        Cart::remove($id_row);
    }
}
