<?php

namespace App\State;

use App\Entity\User;
use ApiPlatform\Metadata\Operation;
use Doctrine\ORM\EntityManagerInterface;
use ApiPlatform\State\ProcessorInterface;
use Symfony\Bundle\SecurityBundle\Security;

class UserProcessor implements ProcessorInterface {

    public function __construct(
        private readonly Security $security,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []) {

        if ($data instanceof User) {
            $data->setClient($this->security->getUser());

            $this->entityManager->persist($data);
            $this->entityManager->flush();
        }

        return $data;
    }
}
