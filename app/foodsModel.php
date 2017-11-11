<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\pageurlModel;

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
}
