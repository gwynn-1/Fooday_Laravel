<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\foodsModel;

class pageurlModel extends Model
{
    protected $table = "pageurl";
    protected $primaryKey = "id";
    public $timestamps = true;

    public function foods(){
        return $this->belongsTo("App\\foodsModel","id_url","id");
    }
}
