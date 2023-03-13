@extends('layout')

@section('actions')
    <a class="btn btn-primary mb-2" type="button" href="{{ route('welcome') }}">Back</a>
    <a class="btn btn-primary mb-2" type="button" href="{{ route('tasks.create') }}">Add task</a>

    <form id="project-filter-form" method="GET" action="{{ route('tasks.index') }}">
        <select id="project-filter-select" name="project_id" class="form-select mb-4" title="Filter by project">
            <option @if (!request('project_id')) selected @endif value="">Filter by project</option>
            @foreach ($projects as $project)
                <option @if (request('project_id') == $project->id) selected @endif value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
    </form>
@endsection

@section('content')
    @if (sizeof($tasks) > 0)
        <div id="items">
            @foreach ($tasks as $task)
                <div class="item p-3 mb-3 position-relative" draggable="true" ondragstart="onDragStart(event)">
                    <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-2">
                        {{ $task->priority }}
                    </span>
                    <p class="mb-0">
                        {{ $task->name }}
                        @if ($task->project_id)
                            <span> - associated to {{ $task->project->name }}</span>
                        @endif
                    </p>
                    <p class="mb-0 fs-small">{{ $task->created_at }}</p>

                    <div class="d-flex flex-column position-absolute top-50 end-0 translate-middle">
                        <a href="{{ route('tasks.edit', ['task' => $task->id ])}}"><i class="bi bi-pencil-fill text-muted"></i></a>
                        <a class="delete-element" id="task-{{ $task->id }}"><i class="bi bi-trash-fill text-danger"></i></a>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $tasks->links('pagination::bootstrap-5') }}
    @else
        <div class="text-center">
            <h5>No tasks 🙁</h5>
            <p>Start by <a class="unclicable" href="{{ route('tasks.create') }}"><strong>creating</strong></a> a new task</p>
        </div>
    @endif

    <x-dialog model="task" elemId="5" />
@endsection