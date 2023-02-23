<?php

declare(strict_types=1);

namespace App\Profile\Domain\Repository;

use App\Profile\Domain\Entity\User;

interface UserRepositoryInterface
{
    public function find($id, $lockMode = null, $lockVersion = null): ?User;

    public function remove(User $user): void;

    public function save(User $user): void;

    public function findOneByUsername(string $username): ?User;
}
