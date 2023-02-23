<?php

declare(strict_types=1);

namespace App\Profile\Application\Command\User;

use App\Profile\Domain\Factory\UserFactory;
use App\Profile\Domain\Repository\UserRepositoryInterface;
use App\Shared\Application\Command\CommandHandlerInterface;
use LogicException;
use function dump;
use function sprintf;

final class CreateUserCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private readonly UserRepositoryInterface $userRepository,
        private readonly UserFactory $userFactory,
    ) {
    }

    public function __invoke(CreateUserCommand $command): string
    {
        if ($this->userRepository->findOneByUsername($command->username)) {
            throw new LogicException(sprintf('User with username: "%s" exits.', $command->username));
        }

        $user = $this->userFactory->create(
            firstName: $command->firstName,
            lastName: $command->lastName,
            username: $command->username,
            authCode: $command->authCode,
            patronymic: $command->patronymic
        );
dump($user);
        $this->userRepository->save($user);

        return $user->getId()->getId();
    }
}
