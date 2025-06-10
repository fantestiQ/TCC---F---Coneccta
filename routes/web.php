<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\TelasController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Candidato\CandidatoController;
use App\Http\Controllers\Candidato\PerfilCandidatoController;
use App\Http\Controllers\Candidato\CandidaturaController;
use App\Http\Controllers\Empresa\EmpresaController;
use App\Http\Controllers\Empresa\PerfilEmpresaController;
use App\Http\Controllers\VagaController;
use App\Http\Controllers\FormVagasController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\VagaPublicaController;
use App\Http\Controllers\Empresa\CurriculoController;





// 1. Rotas Públicas
Route::get('/', [PrincipalController::class, 'principal'])->name('principal');
Route::get('/telas', [TelasController::class, 'telas'])->name('screen');
Route::view('/teste', 'site.teste');
Route::get('form', [FormVagasController::class, 'principal'])->name('form');
Route::get('teste', [TesteController::class, 'teste'])->name('teste');

Route::get('vagas', [VagaPublicaController::class, 'index'])->name('vagas');

// Remove ou comente a rota padrão:
// Auth::routes(['register' => true]); // desabilita o register automático


// 1) Tela de escolha
Route::get('register', [RegisterController::class, 'showChoice'])->name('register');

// 2) Formulário candidato
Route::get('register/candidato', [RegisterController::class, 'showCandidateForm'])->name('register.candidato.form');
Route::post('register/candidato', [RegisterController::class, 'registerCandidate'])->name('register.candidato');

// 3) Formulário empresa
Route::get('register/empresa', [RegisterController::class, 'showCompanyForm'])->name('register.empresa.form');
Route::post('register/empresa', [RegisterController::class, 'registerCompany'])->name('register.empresa');



//  Rotas guest
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

//  Redirecionamento após autenticação para home
Route::middleware('auth')->get('/home', function () {
    return Auth::user()->role === 'empresa'
        ? redirect()->route('empresa.dashboard')
        : redirect()->route('candidato.vagas.disponiveis'); // Alterado para rota nomeada padrão
})->name('home');

// Logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//  Rotas  Candidatos
Route::prefix('candidato')
    ->name('candidato.')
    ->middleware(['auth', 'role:candidato'])
    ->group(function () {
        Route::get('perfil', [PerfilCandidatoController::class, 'show'])->name('perfil');
        Route::put('perfil', [PerfilCandidatoController::class, 'update'])->name('perfil.update');

        // Vagas disponíveis para candidato
         Route::get('vagas', [CandidatoController::class,'vagasDisponiveis'])->name('vagas.disponiveis');

         // Histórico de candidaturas
         Route::get('candidaturas', [CandidatoController::class,'historicoCandidaturas'])->name('candidaturas.index');

        // Se quiser ação de aprovar/recusar via POST:
        Route::post('vagas/{vaga}/candidatar',[CandidaturaController::class,'store'])->name('vagas.candidatar');
        Route::post('vagas/{vaga}/recusar',   [CandidaturaController::class,'recusar'])->name('vagas.recusar');

         // Recebe o POST do form de upload
        Route::post('perfil/curriculo/upload', [PerfilCandidatoController::class, 'uploadCurriculo'])->name('perfil.curriculo.upload');
        // Exibe (ou força download) do arquivo
        Route::get('perfil/curriculo/ver', [PerfilCandidatoController::class, 'verCurriculo'])->name('perfil.curriculo.ver');
    });

    // Rotas específicas para Empresa
 Route::prefix('empresa')
    ->name('empresa.')
    ->middleware(['auth', 'role:empresa'])
    ->group(function () {
        
        Route::get('perfil', [PerfilEmpresaController::class, 'show'])->name('perfil');
        Route::put('perfil', [PerfilEmpresaController::class, 'update'])->name('perfil.update');


        Route::get('dashboard', [EmpresaController::class,'dashboard'])->name('dashboard');
        
        Route::get('candidaturas/{candidatura}/curriculo', [CurriculoController::class, 'show'])->name('candidatura.curriculo');

        //Crud vaga
        Route::resource('vagas', VagaController::class);

        Route::get('vagas', [VagaController ::class, 'index'])->name('vagas.empresa');
        
    });
