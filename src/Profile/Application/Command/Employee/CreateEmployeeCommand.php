<?php

declare(strict_types=1);

namespace App\Profile\Application\Command\Employee;

use App\Shared\Application\Command\CommandInterface;

final class CreateEmployeeCommand implements CommandInterface
{
    public function __construct(
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $username,
        public readonly ?string $avatar = null,
        public readonly ?string $patronymic = null,
        public readonly ?string $profileUrl = null,
    ) {
    }
}
