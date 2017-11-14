<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    //
    protected $table = "menu";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function menuDetail(){
        return $this->hasMany("App\\MenuDetail","id_menu","id");
    }
}
