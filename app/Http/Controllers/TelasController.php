<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelasController extends Controller
{
    public function telas(){

        return view ('site.telas');
    }
}
