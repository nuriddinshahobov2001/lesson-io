<?php

namespace App\Enums;

enum TaskPriorityEnum: int
{
    case LOW = 0;
    case MEDIUM = 1;
    case HIGH = 2;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function label(): string
    {
        return match ($this) {
            self::LOW => 'Low',
            self::MEDIUM => 'Medium',
            self::HIGH => 'High',
        };
    }

    public function classView(): string
    {
        return match ($this) {
            self::LOW => 'bg-green-200 text-green-800',
            self::MEDIUM => 'bg-yellow-200 text-yellow-800',
            self::HIGH => 'bg-red-200 text-red-800',
        };
    }
}
