@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit {{ $project->title }}</h1>
        <form action="{{ route('admin.projects.update', $project->slug) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    required maxlength="150" value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    required maxlength="150" value="{{ old('name', $project->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id">Select type</label>
                <select class="form-control @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                    <option value="">Select a type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                            {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}
                        </option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="repository">Repository</label>
                <input type="url" class="form-control @error('repository') is-invalid @enderror" name="repository"
                    id="repository" maxlength="255" value="{{ old('repository', $project->repository) }}">
                @error('repository')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    cols="30" rows="10">{{ old('description', $project->description) }}
                @error('description')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
                </textarea>
            </div>

            <div class="mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                    id="image" value="{{ old('image', $project->image) }}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="form-group">
                    <h6>Select Technologies</h6>
                    @foreach ($technologies as $technology)
                        <div class="form-check @error('technologies') is-invalid @enderror">
                            <input type="checkbox" class="form-check-input" name="technologies[]"
                                value="{{ $technology->id }}"
                                @if ($errors->any()) {{ in_array($technology->id, old('technologies', $project->technologies)) ? 'checked' : '' }}>
                                @else
                                {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}> @endif
                                <label class="form-check-label">
                            {{ $technology->name }}
                            </label>
                        </div>
                    @endforeach
                    @error('technologies')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>


    </div>
@endsection
