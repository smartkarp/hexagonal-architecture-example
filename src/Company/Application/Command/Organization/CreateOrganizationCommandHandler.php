<?php

declare(strict_types=1);

namespace App\Company\Application\Command\Organization;

use App\Company\Domain\Entity\Organization;
use App\Company\Domain\Factory\OrganizationFactory;
use App\Company\Domain\Repository\OrganizationRepositoryInterface;
use App\Shared\Application\Command\CommandHandlerInterface;

final class CreateOrganizationCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private readonly OrganizationRepositoryInterface $organizationRepository,
        private readonly OrganizationFactory $organizationFactory,
    ) {
    }

    public function __invoke(CreateOrganizationCommand $command): Organization
    {
        $organization = $this->organizationFactory->create(
            id: $command->id,
            actualAddress: $command->actualAddress,
            bank: $command->bank,
            inn: $command->inn,
            legalAddress: $command->legalAddress,
            legalIndex: $command->legalIndex,
            legalName: $command->legalName,
            legalVirtue: $command->legalVirtue,
            name: $command->name,
            number: $command->number,
            phone: $command->phone,
            representative: $command->representative,
            representativeNominative: $command->representativeNominative,
            representativePosition: $command->representativePosition,
        );

        $this->organizationRepository->save($organization);

        return $organization;
    }
}
