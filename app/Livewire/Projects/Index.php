<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        // Chama a função projects() para obter os projetos
        $projects = $this->projects();
        dd($projects); 
        return view('livewire.projects.index', ['projects' => $projects]);
    }

    public function projects() {
        return Project::query()->inRandomOrder()->get();
    }
}
