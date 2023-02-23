<?php

declare(strict_types=1);

namespace App\Profile\Domain\Factory;

use App\Profile\Domain\Entity\User;

final class UserFactory
{
    public function create(
        string $firstName,
        string $lastName,
        string $username,
        ?string $authCode = null,
        ?string $patronymic = null,
    ): User {
        return (new User())
            ->setAuthCode($authCode)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setPatronymic($patronymic)
            ->setUsername($username);
    }
}
