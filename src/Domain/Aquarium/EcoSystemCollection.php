<?php

namespace App\Domain\Aquarium;

use App\Domain\Aquarium\Animal\Animal;
use App\Domain\Aquarium\Plant\Plant;
use Exception;

class EcoSystemCollection
{
    /** @var EcoSystemEntity[] */
    private $entities = [];

    public function __construct()
    {
        $this->entities[Animal::class] = [];
        $this->entities[Plant::class] = [];
    }

    /**
     * @param EcoSystemEntity $ecoSystemEntity
     * @throws Exception
     */
    public function add(EcoSystemEntity $ecoSystemEntity): void
    {
        $entityType = get_parent_class($ecoSystemEntity);
        if (!isset($this->entities[$entityType])) {
            throw new Exception(sprintf('%s is not implemented', $entityType));
        }
        $this->entities[$entityType][] = $ecoSystemEntity;
    }

    /**
     * @return Animal[]
     */
    public function getAnimals(): array
    {
        return $this->entities[Animal::class];
    }
}