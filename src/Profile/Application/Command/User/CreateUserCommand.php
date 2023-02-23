<?php

declare(strict_types=1);

namespace App\Profile\Application\Command\User;

use App\Shared\Application\Command\CommandInterface;

final class CreateUserCommand implements CommandInterface
{
    public function __construct(
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $username,
        public readonly ?string $authCode = null,
        public readonly ?string $patronymic = null,
    ) {
    }
}
