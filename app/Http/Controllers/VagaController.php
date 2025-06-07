<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vaga; 
use Illuminate\Support\Facades\Auth;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $vagas = Vaga::where('empresa_id', auth()->user()->empresa->id)
                     ->orderBy('created_at', 'desc')
                     ->paginate(10);
        return view('vagas.index', compact('vagas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empresa.FormVagas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo'      => 'required|string|max:255',
            'descricao'   => 'required|string',
            'salario'     => 'required|numeric',
            'localizacao' => 'required|string|max:255',
            'escolaridade' => 'required|string|max:255',

        
        ]);

           // Presume que exista relação User→Empresa
        $data['empresa_id'] = auth()->user()->empresa->id;
        Vaga::create($data);

        return redirect()->route('empresa.perfil')
                         ->with('success', 'Vaga criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vaga $vaga)
    {

        $this->authorize('update', $vaga);

        return view('vagas.edit', compact('vaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vaga $vaga)
    {
         $this->authorize('update', $vaga);

        $data = $request->validate([
            'titulo'      => 'required|string|max:255',
            'descricao'   => 'required|string',
            'salario'     => 'nullable|numeric',
            'localizacao' => 'nullable|string|max:255',
            // ...
        ]);

        $vaga->update($data);
        return redirect()->route('vagas.index')
                         ->with('success', 'Vaga atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vaga $vaga)
    {
         $this->authorize('delete', $vaga);
        $vaga->delete();
        return back()->with('success', 'Vaga removida.');
    }
}
