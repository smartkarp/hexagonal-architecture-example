<?php

declare(strict_types=1);

namespace App\Company\Domain\Repository;

use App\Company\Domain\Entity\Organization;

interface OrganizationRepositoryInterface
{
    public function find($id, $lockMode = null, $lockVersion = null): ?Organization;

    public function remove(Organization $organization): void;

    public function save(Organization $organization): void;
}
