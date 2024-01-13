@extends('layouts.app')
@section('content')
    <section id="projects-show">
        <h1 class="display-1">{{$project->title}}</h1>
        <div id="project-prev">
            <img src="{{Vite::asset("/resources/img/$project->image")}}" alt="{{$project->title}}">
        </div>

        <div class="py-5 container text-center">
            <h2 class="fs-1 text-uppercase">Description</h2>
            <p>{{$project->description}}</p>
        </div>

        <div class="text-center pb-5">
            <h2 class="fs-1 text-uppercase">Operations</h2>
            <a class="btn btn-primary" href="{{route('admin.projects.edit', $project->id)}}">Edit</a>
            <a class="btn btn-danger" href="{{route('admin.projects.destroy', $project->id)}}">Delete</a>
        </div>
    </section>
@endsection