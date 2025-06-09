<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Candidato;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function showChoice()
    {
        return view('auth.register-choice');
    }

    // ----------- CANDIDATO -------------
    public function showCandidateForm()
    {
        return view('auth.register-candidato');
    }

    public function registerCandidate(Request $request)
    {   
       
        $this->validatorCandidate($request->all())->validate();
        event(new Registered($user = $this->createCandidate($request->all())));
        auth()->login($user);
        return redirect()->route('home');
    }

    protected function validatorCandidate(array $data)
    {
        return Validator::make($data, [
            'name'            => ['required','string','max:255'],
            'email'           => ['required','string','email','max:255','unique:users'],
            'password'        => ['required','string','min:8','confirmed'],
            'cpf'             => ['required','string','max:8'],
            'data_nascimento' => ['required','date'],
            'telefone'        => ['required','string','max:15'],
            'endereco'        => ['required','string','max:255'],
        ]);
    }

    protected function createCandidate(array $data)
    {
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'candidato',
        ]);

        // cria o registro na tabela candidatos
        $user->candidato()->create([
            'cpf'             => $data['cpf'],
            'data_nascimento' => $data['data_nascimento'],
            'telefone'        => $data['telefone'],
            'endereco'        => $data['endereco'],
        ]);

        return $user;
    }

    // ----------- EMPRESA -------------
    public function showCompanyForm()
    {
        return view('auth.register-empresa');
    }

    public function registerCompany(Request $request)
    {
        
        $this->validatorCompany($request->all())->validate();
        event(new Registered($user = $this->createCompany($request->all())));
        auth()->login($user);
        return redirect()->route('home');
    }

    protected function validatorCompany(array $data)
    {
        return Validator::make($data, [
            'nome_fantasia' => ['required','string','max:255'],
            'email'         => ['required','string','email','max:255','unique:users'],
            'password'      => ['required','string','min:8','confirmed'],
            'cnpj'          => ['required','string', 'max:14'],
            'endereco'      => ['required','string','max:255'],
            'telefone'      => ['required','string','max:15'],
        ]);
    }

    protected function createCompany(array $data)
    {
        $user = User::create([
            'name'     => $data['nome_fantasia'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'empresa',
        ]);

        // cria o registro na tabela empresas
        $user->empresa()->create([
            'cnpj'          => $data['cnpj'],
            'nome_fantasia' => $data['nome_fantasia'],
            'endereco'      => $data['endereco'],
            'telefone'      => $data['telefone'],
        ]);

        return $user;
    }
}
