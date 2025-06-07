<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    
    public function logout()
    {
        Auth::logout();
        session()->invalidate();          // Invalida todos os dados da sessão antiga
        session()->regenerateToken();     // Gera um novo token CSRF seguro
        return redirect()->route('login');
    }
}
