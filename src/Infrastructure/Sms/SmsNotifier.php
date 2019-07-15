<?php

namespace App\Infrastructure\Sms;

use App\Domain\Aquarium\EcoSystemEntity;
use App\Domain\Notifier\Notifier;

class SmsNotifier implements Notifier
{
    public function notifyEntityAdded(EcoSystemEntity $entity): void
    {
        // TODO: SEND SMS HERE.
    }
}