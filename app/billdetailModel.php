<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class billdetailModel extends Model
{
    //
    protected $table = "bill_detail";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['id_bill','id_food','quantity','price'];
    protected $guarded = [];

}
