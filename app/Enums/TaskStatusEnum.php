<?php

namespace App\Enums;

enum TaskStatusEnum: string
{
    case TODO = 'todo';
    case IN_PROGRESS = 'in-progress';
    case COMPLETED = 'completed';
    case FAILED = 'failed';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function label(): string
    {
        return match ($this) {
            self::COMPLETED => 'Completed',
            self::FAILED => 'Failed',
            self::IN_PROGRESS => 'In Progress',
            self::TODO => 'Todo'
        };
    }

    public function color(): string
    {
        return match($this) {
            self::TODO => 'bg-amber-200',
            self::IN_PROGRESS => 'bg-blue-200',
            self::COMPLETED => 'bg-green-200',
            self::FAILED => 'bg-red-200',
        };
    }

}
