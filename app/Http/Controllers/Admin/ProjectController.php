<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::query()->where('created_by', '=', auth()->user()->id)->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function show(string $id)
    {
        $project = Project::query()->findOrFail($id);
        $projects = Project::query()->get();
        $users = User::query()
            ->pluck('name', 'id')
            ->toArray();
        return view('admin.projects.show', compact('project', 'projects', 'users'));
    }
}
