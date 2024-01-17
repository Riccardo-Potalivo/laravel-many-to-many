@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>type List</h1>

        <ul>
            @foreach ($types as $type)
                <li>{{ $type->name }}</li>
            @endforeach
        </ul>

    </div>
@endsection
