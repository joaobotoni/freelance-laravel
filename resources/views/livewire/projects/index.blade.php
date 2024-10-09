    <!-- livewire\projects.index -->
    <div>
        <ul>
            @foreach($projects as $project)
                <li>
                    <a href="{{ route('projects.show', $project->id) }}">
                        {{ $project->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
