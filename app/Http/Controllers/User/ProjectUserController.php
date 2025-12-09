<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;

class ProjectUserController extends Controller
{
    public function index()
    {
        $projects = Project::with('members')
            ->whereHas('members', fn($q) => $q->where('user_id', auth()->id()))
            ->get();

        return view('user.project.index', compact('projects'));
    }

    public function show(string $id)
    {
        $project = Project::with('members')
            ->whereHas('members', fn($q) => $q->where('user_id', auth()->id()))
            ->findOrFail($id);
        $projects = Project::with('members')
            ->whereHas('members', fn($q) => $q->where('user_id', auth()->id()))
            ->get();
        $users = User::query()->pluck('name', 'id')
            ->toArray();
        return view('user.project.show', compact('project', 'projects', 'users'));
    }
}
