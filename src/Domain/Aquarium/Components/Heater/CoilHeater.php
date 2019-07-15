<?php

namespace App\Domain\Aquarium\Components\Heater;

use App\Domain\Aquarium\Components\Heater;
use InvalidArgumentException;

class CoilHeater implements Heater
{
    /** @var int  */
    private $mode;

    public function __construct()
    {
        $this->mode = self::MODE_LOW;
    }

    /**
     * @param int $mode
     */
    public function switchMode(int $mode)
    {
        if (!array_search($mode, self::MODES)) {
            throw new InvalidArgumentException('Unsupported mode');
        }

        $this->mode = $mode;
    }

    /**
     * @return int
     */
    public function getMode(): int
    {
        return $this->mode;
    }
}