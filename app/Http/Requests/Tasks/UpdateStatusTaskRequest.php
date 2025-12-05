<?php

namespace App\Http\Requests\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusTaskRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'status' => 'required|string|in:todo,in-progress,completed,failed',
            'taskOrder' => 'required|array',
            'taskOrder.*.id' => 'required|exists:tasks,id',
            'taskOrder.*.position' => 'required|integer|min:1',
        ];
    }
}
