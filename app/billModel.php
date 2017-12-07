<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class billModel extends Model
{
    //
    protected $table = "bills";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = ['id_customer','date_order','total','payment_method','note','token','token_date','status'];
    protected $guarded = [];

    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
}
