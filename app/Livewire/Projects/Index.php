<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.projects.index', [
            'projects' => $this->projects() 
        ]);
    }

    public function projects() {
        return Project::query()->inRandomOrder()->get();
    }
}
