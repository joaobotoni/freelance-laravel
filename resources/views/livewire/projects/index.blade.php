<div class="grid grid-cols-2 gap-4">  
    @foreach($this->projects() as $project)
        <div>
            <a href="{{ route('projects.show', $project) }}">
                <x-project.simple :$project />
            </a>
        </div>
    @endforeach
</div>
