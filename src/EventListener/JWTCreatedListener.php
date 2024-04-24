<?php

namespace App\EventListener;

use App\Entity\Client;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;

final class JWTCreatedListener {
    #[AsEventListener(event: JWTCreatedEvent::class)]
    public function onJWTCreatedEvent(JWTCreatedEvent $event): void {
        /** @var Client $client */
        $client = $event->getUser();

        $payload        = $event->getData();
        $payload['exp'] = $client->getExpiredAt()->getTimestamp();

        $event->setData($payload);
    }
}
