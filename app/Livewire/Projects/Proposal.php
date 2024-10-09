<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class Proposal extends Component
{
    public $project; // Declare a propriedade

    public function render()
    {
        return view('livewire.projects.proposal');
    }
}

