<?php

namespace App\Domain\Aquarium\Animal;

use App\Domain\Aquarium\Animal\Food\FoodType;
use App\Domain\Aquarium\Animal\Food\Type\Worms;
use App\Domain\Aquarium\Animal\Swim\SwimType;
use App\Domain\Aquarium\Animal\Swim\Vertical;

class Fish extends Animal
{
    public function breathe()
    {

    }

    public function getFoodType(): FoodType
    {
        return new Worms();
    }

    public function getSwimType(): SwimType
    {
        return new Vertical();
    }
}