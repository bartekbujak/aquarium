<?php

namespace App\Application\Aquarium;

use App\Domain\Aquarium\Animal\Food\Food;
use App\Domain\Aquarium\Aquarium;
use App\Domain\Aquarium\Components\Filter;
use App\Domain\Aquarium\Components\Heater;
use App\Domain\Aquarium\EcoSystemEntity;
use App\Domain\Notifier\Notifier;

class AquariumFacade
{
    /** @var Notifier */
    private $notifier;

    public function __construct(Notifier $notifier)
    {
        $this->notifier = $notifier;
    }

    /**
     * @param Heater $heater
     * @param Filter $filter
     * @return Aquarium
     */
    public function createAquarium(Heater $heater, Filter $filter): Aquarium
    {
        return new Aquarium($heater, $filter);
    }

    /**
     * @param Aquarium $aquarium
     * @param int $mode
     */
    public function switchHeaterMode(Aquarium $aquarium, int $mode)
    {
        $aquarium->getHeater()->switchMode($mode);
    }

    /**
     * @param Aquarium $aquarium
     * @param EcoSystemEntity $entity
     * @throws \Exception
     */
    public function addEntity(Aquarium $aquarium, EcoSystemEntity $entity): void
    {
        $aquarium->getEcoSystem()->add($entity);
        $this->notifier->notifyEntityAdded($entity);
    }

    /**
     * @param Aquarium $aquarium
     * @param Food $food
     */
    public function feedAnimals(Aquarium $aquarium, Food $food): void
    {
        foreach ($aquarium->getEcoSystem()->getAnimals() as $animal) {
            $isAnimalFoodType = get_class($animal->getFoodType()) === get_class($food->getFoodType());
            if ($isAnimalFoodType && $animal->isHungry()) {
                $animal->eat();
            }
        }
    }

    /**
     * @param Aquarium $aquarium
     */
    public function switchLight(Aquarium $aquarium): void
    {
        $aquarium->setLight($aquarium->isLight() === false ? true : false);
        foreach ($aquarium->getEcoSystem()->getAnimals() as $animal) {
            $animal->swim($aquarium->isLight());
        }
    }
}