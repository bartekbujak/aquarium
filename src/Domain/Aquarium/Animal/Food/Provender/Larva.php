<?php

namespace App\Domain\Aquarium\Animal\Food\Provender;

use App\Domain\Aquarium\Animal\Food\Food;
use App\Domain\Aquarium\Animal\Food\FoodType;
use App\Domain\Aquarium\Animal\Food\Type\Worms;

class Larva implements Food
{
    public function getFoodType(): FoodType
    {
        return new Worms();
    }
}