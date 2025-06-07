<?php

namespace App\Http\Controllers\Candidato;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidatura;


class CandidaturaController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $candidato = $user->candidato;

        $status = $request->query('status');

        $query = Candidatura::with('vaga')
            ->where('candidato_id', $candidato->id);

        if ($status && in_array($status, Candidatura::getStatuses())) {
            $query->where('status', $status);
        }

        $candidaturas = $query->paginate(10);

        return view('candidato.vagasIndex', compact('candidaturas', 'status'));
    }
}
