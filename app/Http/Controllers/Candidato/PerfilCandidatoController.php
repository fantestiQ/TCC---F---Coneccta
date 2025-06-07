<?php

namespace App\Http\Controllers\Candidato;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Suport\Facades\Storage;

class PerfilCandidatoController extends Controller
{
    public function show()
    {
    $perfil = Auth::user()->candidato;
    return view('candidato.candidatoPerfil', compact('perfil'));
    }

    public function update(Request $req)
    {
    $data = $req->validate([
        'cpf'            => 'required|unique:candidatos,cpf,'.Auth::id().',user_id',
        'data_nascimento'=> 'required|date',
        // …
    ]);
    Auth::user()->candidato()->update($data);
    return back()->with('success','Perfil atualizado');
    }

}
