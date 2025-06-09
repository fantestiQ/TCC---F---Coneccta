<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaga;        
use Illuminate\Support\Facades\Auth;

class VagaPublicaController extends Controller
{
     public function index()
    {
        $vagas = Vaga::where('status','ativa')
                     ->with('empresa')
                     ->orderBy('created_at','desc')
                     ->paginate(12);

        return view('candidato.vagasPublicas', compact('vagas'));
    }

    // Detalhe público de uma vaga
    public function show(Vaga $vaga)
    {
        $vaga->load('empresa');
        return view('vagas.show', compact('vaga'));
    }
}
