<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()->where('created_by', '=', auth()->user()->id)->get();
        if ($projects->count() > 0) {
            $project = $projects->first();
            return view('admin.projects.show', compact('project', 'projects'));
        }
        return view('admin.projects.index', compact('projects'));
    }

    public function show(string $id)
    {
        $project = Project::query()->findOrFail($id);
        $projects = Project::query()->get();
        return view('admin.projects.show', compact('project', 'projects'));
    }
}
