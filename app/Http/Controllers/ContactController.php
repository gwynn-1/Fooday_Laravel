<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foodsModel;

class ContactController extends Controller
{

    public function contact(){
        return view("contact");
    }
}
