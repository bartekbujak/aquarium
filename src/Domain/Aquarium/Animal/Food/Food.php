<?php

namespace App\Domain\Aquarium\Animal\Food;

interface Food
{
    public function getFoodType(): FoodType;
}