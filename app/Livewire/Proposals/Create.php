<?php

namespace App\Livewire\Proposals;

use Livewire\Component;
use App\Models\Project;
use App\Models\Proposal;
use Illuminate\Support\Facades\DB;
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

        $proposal = $this->project->proposals()->updateOrCreate(
            ['email' => $this->email],
            ['hours' => $this->hours]
        );

        $this->arrangePositions($proposal);

        $this->dispatch('proposal::created');
        $this->modal = false;
    }

    public function arrangePositions(Proposal $proposal)
    {
        // Certifique-se de que a proposta e o projeto estão definidos
        if (!$proposal || !$proposal->project_id) {
            return; // Retornar se não houver proposta válida
        }

        $query = DB::select("
            SELECT *, 
                   ROW_NUMBER() OVER (ORDER BY hours ASC) AS newPosition 
            FROM proposals 
            WHERE project_id = :project", 
            ['project' => $proposal->project_id]
        );

        $position = collect($query)->where('id', '=', $proposal->id)->first();

        // Verifique se a posição foi encontrada
        if (!$position) {
            return; // Retornar se não encontrar a posição
        }

        $otherProposal = collect($query)->where('newPosition', '=', $position->newPosition)->first();

        if ($otherProposal) {
            // Atualiza a proposta atual para 'up' se houver outra proposta
            $proposal->update(['position_status' => 'up']);
            
            // Verifica se a outra proposta foi encontrada antes de tentar atualizar
            if ($otherProposal->id !== $proposal->id) {
                Proposal::query()
                    ->where('id', '=', $otherProposal->id)
                    ->update(['position_status' => 'down']);
            }
        }           
    }

    public function render()
    {
        return view('livewire.proposals.create');
    }
}
