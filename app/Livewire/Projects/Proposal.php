<?php

namespace App\Livewire;

use Livewire\Component;

class Proposal extends Component
{
    public Project $project;
    public function render()
    {
        return view('livewire.projects.proposal');
    }
}
