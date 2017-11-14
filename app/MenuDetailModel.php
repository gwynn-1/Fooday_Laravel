<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuDetailModel extends Model
{
    //
    protected $table = "menu_detail";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function Menu(){
        return $this->belongsTo("App\\MenuModel","id_menu","id");
    }

    public function Foods(){
        return $this->hasOne("App\\foodsModel","id_food","id");
    }
}
