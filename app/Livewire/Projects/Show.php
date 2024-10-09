<?php

namespace App\Livewire\Projects;

use Livewire\Component;

class Show extends Component
{
    public $project;

    public function render()
    {
        return view('livewire.projects.show');
    }
}


