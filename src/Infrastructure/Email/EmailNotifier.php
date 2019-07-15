<?php


namespace App\Infrastructure\Email;


use App\Domain\Aquarium\EcoSystemEntity;
use App\Domain\Notifier\Notifier;

class EmailNotifier implements Notifier
{
    public function notifyEntityAdded(EcoSystemEntity $entity): void
    {
        // TODO: SEND EMAIL HERE
    }
}