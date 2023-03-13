@extends('layout')

@section('actions')
    <a class="btn btn-primary mb-4" type="button" href="{{ route('projects.index') }}">Back</a>
@endsection

@section('content')
    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <div>
            <input class="form-control mb-2" type="text" name="name" placeholder="Project name">
            @if($errors->has('name'))
                <small class="text-danger">{{ $errors->first('name') }}</small>
            @endif
        </div>

        <button class="btn btn-primary" type="submit">Save</button>
    </form>
@endsection