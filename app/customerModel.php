<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customerModel extends Model
{
    protected $table = "customers";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable = ['id','name','gender','email','address','phone','note'];
    protected $guarded = [];

    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

}


