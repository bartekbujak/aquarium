<?php

namespace App\Domain\Notifier;

use App\Domain\Aquarium\EcoSystemEntity;

interface Notifier
{
    public function notifyEntityAdded(EcoSystemEntity $entity): void;
}