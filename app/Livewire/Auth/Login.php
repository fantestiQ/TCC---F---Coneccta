<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
  
    public $email = '';
    public $password = '';
    public $remember = false;

    
       protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'email.required' => 'O e-mail é obrigatório',
        'email.email' => 'Digite um e-mail válido',
        'password.required' => 'A senha é obrigatória',
        'password.min' => 'A senha deve ter pelo menos 6 caracteres',
    ];

    public function render()
    {
        return view('livewire.auth.login');
    }



    public function login()
    {
        
    $this->validate();


        // Se o usuário não for encontrado nos hardcoded, tenta autenticar com o banco de dados     
        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ], $this->remember)) {

            $user = Auth::user();
            $user->load(['empresa', 'candidato']); // Carrega os relacionamentos
            session()->regenerate();
            
           $this->redirectByUserType($user);
            return; 
        }

        $this->addError('email', 'Credenciais inválidas.');
        $this->addError('password', 'Verifique sua senha');
    }

protected function redirectByUserType($user)
{
   if ($user->empresa) {
        // Chama sem return
        $this->redirect(route('empresa.dashboard'));
        return;
    }

    if ($user->candidato) {
        $this->redirect(route('candidato.vagas.disponiveis'));
        return;
    }

    $this->redirect(route('principal'));
    return;
}



}