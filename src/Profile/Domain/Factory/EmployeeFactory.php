<?php

declare(strict_types=1);

namespace App\Profile\Domain\Factory;

use App\Profile\Domain\Entity\Employee;
use App\Shared\Domain\ValueObject\UserId;

final class EmployeeFactory
{
    public function create(
        UserId $userId,
        ?string $avatar = null,
        ?string $profileUrl = null,
    ): Employee {
        return (new Employee())
            ->setAvatar($avatar)
            ->setProfileUrl($profileUrl)
            ->setUserId($userId);
    }
}
