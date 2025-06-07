<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormVagasController extends Controller
{
    public function principal(){

        return  view('empresa.FormVagas');
    }
}
