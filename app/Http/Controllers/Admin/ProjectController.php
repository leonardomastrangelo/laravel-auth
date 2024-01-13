<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $formData = $request->validated();
        // created slug
        $slug = Str::slug($formData['title'], '-');
        // add slug to the Form Data
        $formData['slug'] = $slug;
        // take user id
        $userId = auth()->id();
        // add user id to the Form Data
        $formData['user_id'] = $userId;
        // create new post
        $newProject = Project::create($formData);
        // redirect to the post show page with the new post id
        return to_route('admin.posts.show', $newProject->id);

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $formData = $request->validated();
        // created slug
        $slug = Str::slug($formData['title'], '-');
        // add slug to the Form Data
        $formData['slug'] = $slug;
        // take user id
        $formData['user_id'] = $project->user_id;
        $project->fill($formData)->update();
        return to_route('admin.posts.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')->with('success', "Project $project->title has been deleted successfully");
    }
}
