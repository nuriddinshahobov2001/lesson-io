<?php

namespace App\Http\Requests\Tasks;

use App\Models\Board;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusTaskRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'board_id' => 'required|string',
            'taskOrder' => 'required|array',
            'taskOrder.*.id' => 'required|exists:tasks,id',
            'taskOrder.*.position' => 'required|integer|min:1',
        ];
    }
}
