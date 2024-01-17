@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $project->title }}</h1>
        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
        <p>{{ $project->name }}</p>
        <p>Type: {{ $project->type_id }}</p>
        <p>{{ $project->description }}</p>
        <p>{{ $project->repository }}</p>
        <a href="{{ route('admin.projects.edit', $project->slug) }}">edit</a>
    </div>
@endsection
