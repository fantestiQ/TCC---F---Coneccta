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

    public function dashboard()
    {
        // passa a primeira vaga para o componente
        $first = auth()->user()->vagas()->first();
        return view('empresa.empresa', [
            'initialVagaId' => $first ? $first->id : null,
        ]);
    }

    
 
}
