<?php

namespace App\Livewire\Proposals;

use Livewire\Component;
use App\Models\Project;
use Illuminate\Validation\Rule;

class Create extends Component
{
    public Project $project;
    public bool $modal = false;

    #[Rule(['required', 'email'])]
    public string $email = '';

    #[Rule(['required', 'numeric', 'gt:0'])]
    public int $hours = 0;

    public bool $agree = false;

    public function save()
    {

    
        $this->validate([
            'email' => ['required', 'email'],
            'hours' => ['required', 'numeric', 'gt:0'],
        ]);

        if (!$this->agree) {
            $this->addError('agree', 'Você precisa concordar com os termos de uso');

            return;
        }

        $this->project->proposals()->updateOrCreate(
            ['email' => $this->email],
            ['hours' => $this->hours]
        );

        $this->dispatch('proposal::created');
        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.proposals.create');
    }
}

