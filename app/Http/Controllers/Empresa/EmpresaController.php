<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpresaController extends Controller
{
    function empresa()
    {

        $user = Auth::user();
         \Log::info('Acessando empresa', ['user_id' => $user->id]);
        if (!$user->relationLoaded('empresa')) {
            $user->load('empresa');
        }
        
        return view('empresa.empresa', [
            'user' => $user,
            'empresa' => $user -> empresa
        ]);
    }
 
}
