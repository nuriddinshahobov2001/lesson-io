<?php

namespace App\Http\Requests;

use App\Enums\BoardColorsEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreBoardRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'board_name' => ['required', 'string', 'min:3', 'max:100'],
            'board_color' => ['required', 'in:' . implode(',', BoardColorsEnum::values())],
            'project_id' => ['required', 'exists:projects,id'],
        ];
    }
}
