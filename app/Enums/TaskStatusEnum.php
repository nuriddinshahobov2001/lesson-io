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
}
