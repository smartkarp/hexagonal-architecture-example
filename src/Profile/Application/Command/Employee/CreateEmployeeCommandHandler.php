<?php

declare(strict_types=1);

namespace App\Profile\Application\Command\Employee;

use App\Profile\Application\Command\User\CreateUserCommand;
use App\Profile\Domain\Factory\EmployeeFactory;
use App\Profile\Domain\Repository\EmployeeRepositoryInterface;
use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Application\Command\CommandHandlerInterface;
use App\Shared\Domain\ValueObject\UserId;

final class CreateEmployeeCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private readonly CommandBusInterface $commandBus,
        private readonly EmployeeRepositoryInterface $employeeRepository,
        private readonly EmployeeFactory $employeeFactory,
    ) {
    }

    public function __invoke(CreateEmployeeCommand $command): string
    {
        $userId = $this->commandBus->execute(
            new CreateUserCommand(
                firstName: $command->firstName,
                lastName: $command->lastName,
                username: $command->username,
                patronymic: $command->patronymic
            )
        );

        $employee = $this->employeeFactory->create(
            userId: new UserId($userId),
            avatar: $command->avatar,
            profileUrl: $command->profileUrl
        );

        $this->employeeRepository->save($employee);

        return $employee->getId();
    }
}
