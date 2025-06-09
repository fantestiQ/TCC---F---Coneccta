<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Candidatura;

class StoreCandidaturaRequest extends FormRequest
{
    public function authorize()
    {
        // só permite se ainda não houver candidatura igual
        $vaga = $this->route('vaga');
        $candidato = $this->user()->candidato;
        return ! Candidatura::where([
            ['candidato_id',$candidato->id],
            ['vaga_id',     $vaga->id]
        ])->exists();
    }

    public function rules()
    {
        return [];
    }

   
}
