@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="d-flex justify-content-between align-items-center ">
            <h1>project List</h1>
            <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">Create</a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success mb-3 mt-3">
                {{ session()->get('message') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Repository Name</th>
                    <th scope="col">Repository Link</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($projects as $project)
                    <tr>
                        <th scope="row"><a
                                href="{{ route('admin.projects.show', $project->slug) }}">{{ $project->title }}</a></th>
                        <td scope="row">{{ $project->name }}</td>
                        <td scope="row"><a href="{{ $project->repository }}">{{ $project->repository }}</a></td>
                        <td scope="row">
                            <a class="btn btn-primary" href="{{ route('admin.projects.edit', $project->slug) }}">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                        </td>
                        <td scope="row">

                            <button type="button" class="btn btn-danger delete_button"
                                data_item_title="{{ $project->name }}"
                                form_action="{{ route('admin.projects.destroy', $project->slug) }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>

    @include('partials.modal-delete')
@endsection
