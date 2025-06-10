<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Candidatura;
use Illuminate\Support\Facades\Storage;

class CurriculoController extends Controller
{
    public function show(Candidatura $candidatura)
    {
        // 1) Garante que a vaga pertence à empresa logada
        $empresa = auth()->user()->empresa;
        if ($candidatura->vaga->empresa_id !== $empresa->id) {
            abort(403);
        }

        // 2) Verifica se o arquivo existe no disco 'public'
        $disk = Storage::disk('public');
        $path = $candidatura->candidato->resume_path;
        if (! $disk->exists($path)) {
            abort(404);
        }

        // 3) Retorna o PDF embutido
        return response()->file(
            $disk->path($path),
            ['Content-Type' => 'application/pdf']
        );
    }
}
