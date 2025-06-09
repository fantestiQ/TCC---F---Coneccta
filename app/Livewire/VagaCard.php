<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vaga;
use App\Models\Candidatura;

class VagaCard extends Component
{

   
    public Vaga $vaga;
    public string $context;
    public $status;
    public $feedback;

    public function mount(Vaga $vaga, string $context = 'guest')
    {
        $this->vaga    = $vaga;
        $this->context = $context;

        if ($context === 'candidato' && auth()->check()) {
            $cand = auth()->user()->candidato;
             $app  = Candidatura::where([
                ['vaga_id',      $this->vaga->id],
                ['candidato_id', $cand->id],
                ])->first();
                $this->status = $app->status ?? null;
             }
    }

     public function candidatar()
    {
        $cand = auth()->user()->candidato;
        Candidatura::updateOrCreate(
            ['vaga_id'=>$this->vaga->id,'candidato_id'=>$cand->id],
            ['status'=>Candidatura::STATUS_APLICADO]
        );
        $this->status   = Candidatura::STATUS_APLICADO;
        $this->feedback = 'Candidatura enviada com sucesso!';
    }

    public function recusar()
    {
        $cand = auth()->user()->candidato;
        Candidatura::updateOrCreate(
            ['vaga_id'=>$this->vaga->id,'candidato_id'=>$cand->id],
            ['status'=>Candidatura::STATUS_RECUSADO]
        );
        $this->status   = Candidatura::STATUS_RECUSADO;
        $this->feedback = 'Você rejeitou esta vaga.';
    }

    public function render()
    {
        return view('livewire.vaga-card');
    }
}
