@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $project->title }}</h1>
        <h6>Immage</h6>
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
        <h6>Name</h6>
        <p>{{ $project->name }}</p>
        <h6>Type</h6>
        <p>Type: {{ $project->type_id }}</p>
        <h6>Description</h6>
        <p>{{ $project->description }}</p>
        <h6>Repository</h6>
        <p>{{ $project->repository }}</p>

        @if ($project->technologies)
            <div class="mb-3">
                <h6>Technologies</h6>

                @foreach ($project->technologies as $technology)
                    <a class="badge text-bg-primary"
                        href="{{ route('admin.technologies.show', $technology->slug) }}">{{ $technology->name }}</a>
                @endforeach
            </div>
        @endif

        <a class="btn btn-success " href="{{ route('admin.projects.edit', $project->slug) }}"">edit</a>
    </div>
@endsection
