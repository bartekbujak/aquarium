<?php

namespace App\Domain\Aquarium\Animal\Food\Provender;

use App\Domain\Aquarium\Animal\Food\Food;
use App\Domain\Aquarium\Animal\Food\FoodType;
use App\Domain\Aquarium\Animal\Food\Type\SeaFood;

class Shrimp implements Food
{
    public function getFoodType(): FoodType
    {
        return new SeaFood();
    }
}