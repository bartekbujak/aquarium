<?php

namespace App\Domain\Aquarium\Animal;

use App\Domain\Aquarium\Animal\Food\FoodType;
use App\Domain\Aquarium\Animal\Food\Type\SeaFood;
use App\Domain\Aquarium\Animal\Swim\Horizontal;
use App\Domain\Aquarium\Animal\Swim\SwimType;

class Turtle extends Animal
{
    public function breathe()
    {

    }

    public function getFoodType(): FoodType
    {
        return new SeaFood();
    }

    public function getSwimType(): SwimType
    {
        return new Horizontal();
    }
}