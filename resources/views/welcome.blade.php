@extends('layout')

@section('content')
    <h4 class="text-dark text-center">Welcome !</h4>
    <p class="text-dark text-center">Start by managing projects or tasks</p>
    <a class="btn btn-primary float-start" type="button" href="{{ route('projects.index') }}">Manage projects</a>
    <a class="btn btn-primary float-end" type="button" href="{{ route('tasks.index') }}">Manage tasks</a>
@endsection