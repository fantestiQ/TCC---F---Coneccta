<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

/**
 * Componente Livewire para um menu de navegação dinâmico conforme o tipo de usuário 
 * (visitante, candidato ou empresa). Detecta automaticamente o tipo de usuário e 
 * exibe os itens de menu correspondentes, incluindo nome do usuário e botão de logout.
 */
class NavMenu extends Component
{
    public $userType;
    public $userName;

    // Ouvintes de eventos para atualizar o menu após login/logout
    protected $listeners = [
        'userLoggedIn'  => 'updateMenu',
        'userLoggedOut' => 'updateMenu',
    ];

    public function mount()
    {
        $this->determineUser();
    }

    /**
     * Determina o tipo de usuário atualmente autenticado e define as propriedades 
     * $userType e $userName de acordo.
     */
    public function determineUser()
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Verifica atributo de tipo/role do usuário (ex: 'candidato' ou 'empresa')
            if ($user->role === 'candidato') {
                $this->userType = 'candidato';
            } elseif ($user->role === 'empresa') {
                $this->userType = 'empresa';
            } else {
                $this->userType = 'user';  // outro tipo de usuário logado (caso geral)
            }
            $this->userName = $user->name;
        } else {
            // Usuário não autenticado (visitante)
            $this->userType = 'guest';
            $this->userName = '';
        }
    }

    /**
     * Atualiza o menu quando um evento de login/logout é capturado.
     */
    public function updateMenu()
    {
        $this->determineUser();
    }

    /**
     * Realiza logout do usuário atual e emite um evento para atualizar o menu.
     */
    public function logout()
    {
        Auth::logout();                 // Termina a sessão do usuário
        $this->userType = 'guest';  // Emite evento para informar outros compontentes (opcional)
        return redirect()->route('principal');  // Redireciona para a página principal
    }

    public function render()
    {
        return view('livewire.nav-menu');
    }
}

    



    