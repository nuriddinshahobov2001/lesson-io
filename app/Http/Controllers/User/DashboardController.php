<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $task = Task::all();
        $tasksDetails = [
            'count' => $task->where('assigned_to', auth()->user()->id)->count(),
        ];
        return view('user.dashboard.index', compact('tasksDetails'));
    }
}
