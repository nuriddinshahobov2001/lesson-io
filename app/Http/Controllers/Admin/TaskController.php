<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tasks\UpdateStatusTaskRequest;
use App\Models\Board;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $boards = Board::query()->where('user_id', '=', auth()->user()->id)->orderBy('position')->get();
        return view('admin.tasks.index', compact('boards'));
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
