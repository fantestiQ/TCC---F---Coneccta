<?php

namespace App\Http\Controllers\Candidato;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Candidatura;
use App\Models\Vaga;
use App\Http\Requests\StoreCandidaturaRequest;


class CandidaturaController extends Controller
{
    /**
     * Lista as candidaturas do candidato.
     */
    public function index(Request $request)
    {
        $candidato = Auth::user()->candidato;
        $status    = $request->query('status');

        $query = Candidatura::with('vaga')
            ->where('candidato_id', $candidato->id);

        if ($status && in_array($status, Candidatura::getStatuses())) {
            $query->where('status', $status);
        }

        $candidaturas = $query->paginate(10);

        return view('candidato.vagasIndex', compact('candidaturas','status'));
    }

    /**
     * Candidatar-se a uma vaga.
     */
        public function store(StoreCandidaturaRequest $request, Vaga $vaga)
    {
        $candidato = $request->user()->candidato;

        Candidatura::create([
            'candidato_id' => $candidato->id,
            'vaga_id'      => $vaga->id,
            'status'       => Candidatura::STATUS_APLICADO,
        ]);

        return back()->with('message', 'Candidatura enviada com sucesso!')->with('alert-type','success');
    }

    /**
     * Recusar uma vaga.
     */
    public function recusar(Vaga $vaga)
    {
        $candidato = Auth::user()->candidato;

        // Marca como recusada, mesmo se ainda não houver registro
        $candidatura = Candidatura::updateOrCreate(
            ['candidato_id'=>$candidato->id,'vaga_id'=>$vaga->id],
            ['status'=>Candidatura::STATUS_RECUSADO]
        );

        return back()->with('message', 'Candidatura rejeitada!')->with('alert-type','warning');

    }
}
