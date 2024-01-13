@extends('layouts.app')
@section('content')
    <section id="projects-index" class="container">
        <h1 class="display-1">My projects</h1>
        
        {{-- PROJECTS' TABLE --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Logo</th>
                    <th scope="col">ID</th>
                    <th scope="col">User_ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <th scope="row">
                        <div class="logo-container">
                            <img
                            src="{{Vite::asset("/resources/img/$project->logo")}}"
                            alt="{{$project->title}}">
                        </div>
                    </th>
                    <td>{{$project->id}}</td>
                    <td>{{$project->user_id}}</td>
                    <td>{{$project->title}}</td>
                    <td>{{$project->description}}</td>
                    <td class="text-center"> {{-- OPERATIONS --}}
                        <a class="btn btn-info" href="{{route('admin.projects.show', $project->id)}}">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a class="btn btn-warning" href="{{route('admin.projects.edit', $project->id)}}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a class="btn btn-danger" href="{{route('admin.projects.destroy', $project->id)}}">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection