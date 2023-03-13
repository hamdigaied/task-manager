@extends('layout')

@section('actions')
    <a class="btn btn-primary mb-4" type="button" href="{{ route('welcome') }}">Back</a>
    <a class="btn btn-primary mb-4" type="button" href="{{ route('projects.create') }}">Add project</a>
@endsection

@section('content')
    @if (sizeof($projects) > 0)
        @foreach ($projects as $project)
            <div class="item p-3 mb-3 position-relative">
                <p class="mb-0">{{ $project->name }}</p>
                <div class="d-flex flex-column position-absolute top-50 end-0 translate-middle">
                    <a class="delete-element" id="project-{{ $project->id }}"><i class="bi bi-trash-fill text-danger"></i></a>
                </div>
            </div>
        @endforeach

        {{ $projects->links('pagination::bootstrap-5') }}
    @else
        <div class="text-center">
            <h5>No projects 🙁</h5>
            <p>Start by <a class="unclicable" href="{{ route('projects.create') }}"><strong>creating</strong></a> a new project !</p>
        </div>
    @endif

    <x-dialog model="project" id="" />
@endsection