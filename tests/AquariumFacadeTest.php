<?php

namespace App\Tests;

use App\Application\Aquarium\AquariumFacade;
use App\Domain\Aquarium\Animal\Animal;
use App\Domain\Aquarium\Animal\Fish;
use App\Domain\Aquarium\Animal\Food\Food;
use App\Domain\Aquarium\Animal\Food\Provender\Larva;
use App\Domain\Aquarium\Animal\Food\Provender\Shrimp;
use App\Domain\Aquarium\Animal\Turtle;
use App\Domain\Aquarium\Components\Filter\NaturalFilter;
use App\Domain\Aquarium\Components\Filter\TurboFilter;
use App\Domain\Aquarium\Components\Heater;
use App\Domain\Aquarium\Components\Heater\CoilHeater;
use App\Infrastructure\Email\EmailNotifier;
use PHPUnit\Framework\TestCase;

class AquariumFacadeTest extends TestCase
{
    /**
     * @var AquariumFacade
     */
    public $facade;

    public function setUp(): void
    {
        $this->facade = new AquariumFacade(new EmailNotifier());
    }

    public function testSwitchHeaterMode()
    {
        $coilHeater = new CoilHeater();
        $mode = $coilHeater->getMode();
        $aquarium = $this->facade->createAquarium($coilHeater, new NaturalFilter());
        $this->facade->switchHeaterMode($aquarium, Heater::MODE_HIGH);
        $this->assertNotEquals($mode, $coilHeater->getMode());
    }

    public function testSwitchLight()
    {
        $aquarium = $this->facade->createAquarium(new CoilHeater(), new TurboFilter());
        $animal = new Turtle();
        $this->facade->addEntity($aquarium, $animal);
        $this->facade->switchLight($aquarium);
        $this->assertEquals($animal->isSwim(), true);
    }

    /**
     * @dataProvider getFeedAnimalsData
     * @param Animal $animal
     * @param Food $food
     * @param bool $expectedHungry
     * @throws \Exception
     */
    public function testFeedAnimals(Animal $animal, Food $food, bool $expectedHungry)
    {
        $aquarium = $this->facade->createAquarium(new CoilHeater(), new TurboFilter());
        $this->facade->addEntity($aquarium, $animal);
        $this->facade->feedAnimals($aquarium, $food);
        $this->assertEquals($animal->isHungry(), $expectedHungry);
    }

    /**
     * @return array
     */
    public function getFeedAnimalsData(): array
    {
        return [
            [new Turtle(), new Shrimp(), false],
            [new Turtle(), new Larva(), true],
            [new Fish(), new Larva(), false],
            [new Fish(), new Shrimp(), true],
        ];
    }
}