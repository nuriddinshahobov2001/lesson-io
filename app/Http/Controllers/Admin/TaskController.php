<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\UpdateStatusTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::query()->orderBy('position')->get();
        return view('admin.tasks.index', compact('tasks'));
    }

    public function changeStatus(UpdateStatusTaskRequest $request)
    {
        $data = $request->validated();
        foreach ($data['taskOrder'] as $taskData) {
            Task::query()->where('id', $taskData['id'])
                ->update([
                    'status' => $data['status'], // обновляем статус
                    'position' => $taskData['position'] // сохраняем порядок
                ]);
        }
        return response()->json([
            'success' => true,
        ]);
    }
}
