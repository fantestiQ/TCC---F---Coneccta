<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilEmpresaController extends Controller
{
    public function show()
    {
    $perfil = Auth::user()->empresa;
    return view('empresa.empresaPerfil', compact('perfil'));
    }

    public function update(Request $req)
    {
    $data = $req->validate([
        'nome_fantasia' => 'required|string',
        'cnpj'          => 'required|unique:empresas,cnpj,'.Auth::id().',user_id',
        // …
    ]);
    Auth::user()->empresa()->update($data);
    return back()->with('success','Perfil atualizado');
    }

}
