<?php

namespace App\Domain\Aquarium\Animal;

use App\Domain\Aquarium\Animal\Food\Food;
use App\Domain\Aquarium\Animal\Swim\SwimType;
use App\Domain\Aquarium\EcoSystemEntity;

abstract class Animal implements EcoSystemEntity, Food
{
    /** @var bool */
    private $isHungry;

    /** @var bool */
    private $swim;

    abstract public function getSwimType(): SwimType;

    public function __construct()
    {
        $this->isHungry = true;
        $this->swim = false;
    }

    /**
     * @param bool $isSwim
     */
    public function swim(bool $isSwim): void
    {
        if ($isSwim) {
            $this->getSwimType();
            $this->breathe();
            $this->swim = true;
        } else {
            $this->swim = false;
        }
    }

    public function eat(): void
    {
        $this->isHungry = false;
    }

    /**
     * @return bool
     */
    public function isHungry(): bool
    {
        return $this->isHungry;
    }

    /**
     * @return bool
     */
    public function isSwim(): bool
    {
        return $this->swim;
    }
}