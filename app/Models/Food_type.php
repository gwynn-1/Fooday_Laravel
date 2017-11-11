<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Food_type extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'food_type';
    protected $primaryKey = 'id';
     public $timestamps = false;
    // protected $guarded = ['id'];
     protected $fillable = ['name','description','image'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function Foods(){
        return $this->hasMany("App\Models\Foods","id_type");
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
