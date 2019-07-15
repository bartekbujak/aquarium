<?php

namespace App\Domain\Aquarium\Components;

interface Heater
{
    const MODE_LOW = 0;
    const MODE_MEDIUM = 1;
    const MODE_HIGH = 2;

    const MODES = [
        self::MODE_LOW,
        self::MODE_MEDIUM,
        self::MODE_HIGH,
    ];

    public function switchMode(int $mode);
}