<?php

namespace App\State;

use App\Entity\User;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class UserProcessor implements ProcessorInterface {

    public function __construct(
        private readonly Security $security,
        #[Autowire(service: 'api_platform.doctrine.orm.state.persist_processor')]
        private readonly ProcessorInterface $persistProcessor,
    ) {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []) {
        if ($data instanceof User) {
            $data->setClient($this->security->getUser());
        }

        return $this->persistProcessor->process($data, $operation, $uriVariables, $context);
    }
}
