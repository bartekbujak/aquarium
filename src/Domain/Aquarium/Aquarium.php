<?php

namespace App\Domain\Aquarium;

use App\Domain\Aquarium\Components\Filter;
use App\Domain\Aquarium\Components\Heater;

final class Aquarium
{
    /** @var EcoSystemCollection  */
    private $ecoSystem;

    /** @var Heater */
    private $heater;

    /** @var bool */
    private $light;

    /** @var Filter */
    private $filter;

    public function __construct(Heater $heater, Filter $filter)
    {
        $this->ecoSystem = new EcoSystemCollection();
        $this->light = false;
        $this->heater = $heater;
        $this->filter = $filter;
    }

    /**
     * @return EcoSystemCollection
     */
    public function getEcoSystem(): EcoSystemCollection
    {
        return $this->ecoSystem;
    }

    /**
     * @return Heater
     */
    public function getHeater(): Heater
    {
        return $this->heater;
    }

    /**
     * @return bool
     */
    public function isLight(): bool
    {
        return $this->light;
    }

    /**
     * @param bool $light
     */
    public function setLight(bool $light): void
    {
        $this->light = $light;
    }

    /**
     * @return Filter
     */
    public function getFilter(): Filter
    {
        return $this->filter;
    }
}