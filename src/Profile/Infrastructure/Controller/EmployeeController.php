<?php

declare(strict_types=1);

namespace App\Profile\Infrastructure\Controller;

use App\Profile\Application\Command\Employee\CreateEmployeeCommand;
use App\Profile\Application\Query\Employee\EmployeeQuery;
use App\Profile\Domain\Entity\Employee;
use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Application\Query\QueryBusInterface;
use TheCodingMachine\GraphQLite\Annotations\Mutation;
use TheCodingMachine\GraphQLite\Annotations\Query;

final class EmployeeController
{
    public function __construct(
        private readonly CommandBusInterface $commandBus,
        private readonly QueryBusInterface $queryBus,
    ) {
    }

    #[Mutation]
    public function createEmployee(
        string $firstName,
        string $lastName,
        string $username,
        ?string $avatar = null,
        ?string $patronymic = null,
        ?string $profileUrl = null,

    ): Employee {
        return $this->commandBus->execute(
            new CreateEmployeeCommand(
                firstName: $firstName,
                lastName: $lastName,
                username: $username,
                avatar: $avatar,
                patronymic: $patronymic,
                profileUrl: $profileUrl
            )
        );
    }

    #[Query]
    public function employee(string $id): ?Employee
    {
        return $this->queryBus->execute(new EmployeeQuery($id));
    }

    /**
     * @return Employee[]
     */
    #[Query]
    public function employees(): array
    {
        return $this->queryBus->execute(new EmployeeQuery());
    }
}
