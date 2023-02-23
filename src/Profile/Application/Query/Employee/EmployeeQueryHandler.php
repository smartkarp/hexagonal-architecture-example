<?php

declare(strict_types=1);

namespace App\Profile\Application\Query\Employee;

use App\Profile\Domain\Entity\Employee;
use App\Profile\Domain\Repository\EmployeeRepositoryInterface;
use App\Shared\Application\Query\QueryHandlerInterface;

final class EmployeeQueryHandler implements QueryHandlerInterface
{
    public function __construct(
        private readonly EmployeeRepositoryInterface $employeeRepository,
    ) {
    }

    public function __invoke(EmployeeQuery $query): Employee|array|null
    {
        if ($query->id) {
            return $this->employeeRepository->find($query->id);
        }

        return $this->employeeRepository->findAll();
    }
}
