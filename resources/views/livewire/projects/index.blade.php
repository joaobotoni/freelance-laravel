<div>
    <h1>Projects:</h1>
    <br>
    <ul>
        @foreach($this->projects() as $project)
            <li>
                <a href="{{ route('projects.show', $project->id) }}">
                    {{ $project->title }}
                </a>
            </li>
        @endforeach
    </ul>
</div>