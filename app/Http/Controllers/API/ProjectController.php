<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['type', 'tags', 'user'])->orderByDesc('id')->paginate(20);

        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }


    public function show($slug)
    {
        $project = Project::with(['type', 'tags', 'user'])->where('slug', $slug)->first();

        if ($project) {

            return response()->json([
                'success' => true,
                'result' => $project
            ]);
        } else {

            return response()->json([
                'success' => false,
                'result' => 'Project not found 404'
            ]);
        }
    }
}
