<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::query()->orderBy('due_date', 'asc')->get();
        return view('admin.tasks.index', compact('tasks'));
    }
}
