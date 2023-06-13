<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Type;
use App\Models\User;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Project::orderByDesc('id')->get();
        // return view('admin.projects.index', compact('projects'));
        // dd(Project::all());

        $projects = Auth::user()->projects()->orderByDesc("id")->get();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $tags = Tag::all();
        return view('admin.projects.create', compact('tags', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data =  $request->validated();
        $slug = Project::generateSlug($val_data['title']);
        $val_data['slug'] = $slug;

        $user_id = Auth::user()->id;
        $val_data['user_id'] = $user_id;

        if ($request->hasFile('logo')) {
            $image_path = Storage::put('uploads', $request->logo);
            //dd($image_path);
            $val_data['logo'] = $image_path;
        }


        $new_progect = Project::create($val_data);

        if ($request->has('tags')) {
            $new_progect->tags()->attach($request->tags);
        }


        return to_route('admin.projects.index')->with('message', 'Project Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // dd($project->user->name);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $tags = Tag::orderByDesc('id')->get();
        return view('admin.projects.edit', compact('project', 'types', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //print_r($request->file('logo'));
        // dd($request);
        $val_data =  $request->validated();
        $slug = Project::generateSlug($val_data['title']);
        $val_data['slug'] = $slug;

        if ($request->has('tags')) {
            $project->tags()->sync($request->tags);
        }


        if ($request->hasFile('logo')) {

            if ($project->logo) {
                Storage::delete($project->logo);
            }

            $image_path = Storage::put('uploads', $request->logo);

            $val_data['logo'] = $image_path;
        }


        $project->update($val_data);
        return to_route('admin.projects.index')->with('message', 'file edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')->with('message', "$project->title delete successfully");
    }
}
