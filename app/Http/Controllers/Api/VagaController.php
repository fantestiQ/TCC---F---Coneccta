<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function aplicar(Request $request, Vaga $vaga)
{
    // aqui só faz o pivot sem lógica extra
    $candidatoId = $request->input('candidato_id');
    $vaga->candidaturas()->create([
        'candidato_id' => $candidatoId,
        'status'       => 'aplicado',
    ]);
    return response()->json(['message' => 'Candidatura criada'], 201);
}


}
