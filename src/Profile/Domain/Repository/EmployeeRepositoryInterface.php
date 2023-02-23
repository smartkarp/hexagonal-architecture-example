<?php

declare(strict_types=1);

namespace App\Profile\Domain\Repository;

use App\Profile\Domain\Entity\Employee;

interface EmployeeRepositoryInterface
{
    public function find($id, $lockMode = null, $lockVersion = null): ?Employee;

    public function remove(Employee $employee): void;

    public function save(Employee $employee): void;
}
