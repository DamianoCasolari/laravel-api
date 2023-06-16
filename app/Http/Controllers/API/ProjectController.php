<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['type', 'tags', 'user'])->orderByDesc('id')->paginate(9);

        return response()->json([
            'success' => true,
            'projects' => $projects
        ]);
    }
}
