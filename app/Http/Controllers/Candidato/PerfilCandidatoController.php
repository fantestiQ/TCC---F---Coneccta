<?php

namespace App\Http\Controllers\Candidato;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function uploadCurriculo(Request $request)
{
    $request->validate([
        'curriculo' => 'required|file|mimes:pdf,doc,docx|max:4096',
    ]);

    $user  = auth()->user();
    $candidato = $user->candidato;

    // Apaga versão antiga, se houver
    if ($candidato->resume_path) {
        Storage::disk('public')->delete($candidato->resume_path);
    }

    // Armazena em storage/app/public/resumes
    $path = $request->file('curriculo')
                    ->store('resumes', 'public');

    $candidato->update(['resume_path' => $path]);

    return back()->with('success', 'Currículo carregado com sucesso!');
}

    public function verCurriculo()
    {
        $candidato = auth()->user()->candidato;

        if (! $candidato->resume_path
        || ! Storage::disk('public')->exists($candidato->resume_path)) {
            abort(404);
        }

        // Abre no navegador
        return response()->file(
            storage_path("app/public/{$candidato->resume_path}")
        );
        

    }
}
