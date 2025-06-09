<?php

namespace App\Http\Controllers\Candidato;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vaga;




class CandidatoController extends Controller
{
    public function vagasDisponiveis()
    {
        $vagas = Vaga::where('status','ativa')
                     ->with('empresa')
                     ->orderBy('created_at','desc')
                     ->paginate(12);

        return view('candidato.vagasIndex', compact('vagas'));
    }

    // Histórico de candidaturas do candidato
    public function historicoCandidaturas()
    {
        $candidato     = Auth::user()->candidato;
        $candidaturas  = $candidato
                          ->candidaturas()
                          ->with('vaga.empresa')
                          ->orderBy('created_at','desc')
                          ->paginate(10);

        return view('candidato.candidaturasIndex', compact('candidaturas'));
    }
   
}
