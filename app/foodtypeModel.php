<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foodtypeModel extends Model
{
    protected $table = "food_type";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function foods(){
        return $this->hasMany("app\\foodsModel","id_type","id");
    }
}
