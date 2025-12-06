<?php

namespace App\Enums;

enum BoardColorsEnum: string
{
    case DEFAULT = '#fee685';
    case BLUE = '#bedbff';
    case GREEN = '#b9f8cf';
    case RED = '#ffc9c9';
    case PURPLE = '#e6d4ff';
    case ORANGE = '#ffe5b4';
    case TEAL = '#b4f0f0';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
