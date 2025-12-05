<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'position',
        'priority',
        'due_date',
        'created_by',
        'assigned_to',
    ];

    public function createdBy(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignedTo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    protected function casts(): array
    {
        return [
            'status' => \App\Enums\TaskStatusEnum::class,
            'priority' => \App\Enums\TaskPriorityEnum::class,
            'due_date' => 'datetime',
        ];
    }
}
