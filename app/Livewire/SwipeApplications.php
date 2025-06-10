<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Candidatura;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusCandidaturaMail;
use Illuminate\Support\Collection;

class SwipeApplications extends Component
{
    public Collection $vagas;
    public ?int       $selectedVagaId;
    public Collection $applications;
    public int        $currentIndex = 0;

    protected $listeners = [
        'selectVaga',
        'swipeLeft',
        'swipeRight',
    ];

    public function mount()
    {
        $this->vagas         = auth()->user()->vagas()->get();
        $this->selectedVagaId = $this->vagas->first()?->id;
        $this->loadApplications();
    }

    public function selectVaga($vagaId)
    {
        $this->selectedVagaId = $vagaId;
        $this->currentIndex   = 0;
        $this->loadApplications();
    }

    private function loadApplications()
    {
        if (! $this->selectedVagaId) {
            $this->applications = collect();
            return;
        }

        $this->applications = Candidatura::with('candidato.user')
            ->where('vaga_id', $this->selectedVagaId)
            ->where('status', Candidatura::STATUS_APLICADO)
            ->get();
    }

    public function swipeLeft()
    {
        $this->updateAndEmail(Candidatura::STATUS_RECUSADO);

        // flash de confirmação
        session()->flash('message', 'E-mail de recusa enviado!');
        $this->nextCard();
    }

    public function swipeRight()
    {
        $this->updateAndEmail(Candidatura::STATUS_APROVADO);

        // flash de confirmação
        session()->flash('message', 'E-mail de aprovação enviado!');
        $this->nextCard();
    }

    private function updateAndEmail(string $empresaStatus)
    {
        $c = $this->applications->get($this->currentIndex);
        if (! $c) {
            return;
        }

        if (! $c->candidato || ! $c->candidato->user || ! $c->candidato->user->email) {
            session()->flash('error', 'Não foi possível enviar o e-mail: candidato ou e-mail não encontrado.');
            return;
        }

        $c->update(['empresa_status' => $empresaStatus]);

        Mail::to($c->candidato->user->email)
            ->send(new StatusCandidaturaMail($c, $empresaStatus));
    }

    private function nextCard()
    {
        if ($this->currentIndex < $this->applications->count() - 1) {
            $this->currentIndex++;
        } else {
            session()->flash('message', 'Todos os currículos foram avaliados.');
            $this->applications = collect();
            $this->currentIndex = 0;
        }
    }

    public function render()
    {
        return view('livewire.swipe-applications');
    }
}
