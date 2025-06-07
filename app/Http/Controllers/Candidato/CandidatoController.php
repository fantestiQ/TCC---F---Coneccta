<?php

namespace App\Http\Controllers\Candidato;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatoController extends Controller
{
    public function vagas(){

        $user = Auth::user();

        if (!$user) {
            // Pode redirecionar ou simplesmente mostrar a view sem dados de usuário
            return view('candidato.vagas', [
                'user' => null,
                'candidato' => null,
            ]);
        }

        if (!$user->relationLoaded('candidato')) {
            $user->load('candidato');
        }

        return view('candidato.vagas', [
            'user' => $user,
            'candidato' => $user->candidato
        ]);
        }

   
}
