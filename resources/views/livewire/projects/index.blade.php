<div>
<div>
    @if ($projects->isEmpty())
        <p>Nenhum projeto encontrado.</p>
    @else
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('projects.show', $project) }}">
                    {{ $project->id }} . {{ $project->title }}
                </a>
            </li>
        @endforeach
    @endif
</div>
</div>