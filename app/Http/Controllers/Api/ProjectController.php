<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('type', 'technologies')->paginate(4);

        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();

        return response()->json([
            'success' => true,
            'results' => $project,
        ]);
    }
}
