<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\StoreTaskRequest;
use App\Http\Requests\Tasks\UpdateStatusTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function store(StoreTaskRequest $request)
    {
        $data = $request->validated();
        Task::query()->create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'board_id' => $data['board_id'],
            'priority' => $data['priority'],
            'due_date' => $data['due_date'],
            'assigned_to' => $data['assigned_to'],
            'created_by' => auth()->user()->id,
        ]);
        return redirect()->route('projects.show', $data['project_id'])->with('success', 'Task created successfully.');
    }

    public function changeStatus(UpdateStatusTaskRequest $request)
    {
        $data = $request;

        foreach ($data['taskOrder'] as $taskData) {
            Task::query()->where('id', $taskData['id'])
                ->update([
                    'board_id' => $data['board_id'],
                    'position' => $taskData['position']
                ]);
        }

        return response()->json([
            'success' => true,
        ]);
    }
}
