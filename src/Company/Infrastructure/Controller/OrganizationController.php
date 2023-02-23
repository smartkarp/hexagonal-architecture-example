<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Controller;

use App\Company\Application\Command\Organization\CreateOrganizationCommand;
use App\Company\Application\Query\Organization\QueryOrganization;
use App\Company\Domain\Entity\Affiliate;
use App\Company\Domain\Entity\Organization;
use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Application\Query\QueryBusInterface;
use App\Shared\Domain\Service\Uuid;
use TheCodingMachine\GraphQLite\Annotations\Mutation;
use TheCodingMachine\GraphQLite\Annotations\Query;

final class OrganizationController
{
    public function __construct(
        private readonly CommandBusInterface $commandBus,
        private readonly QueryBusInterface $queryBus,
    ) {
    }

    #[Mutation]
    public function createOrganization(
        ?string $actualAddress,
        string $bank,
        int $inn,
        string $legalAddress,
        string $legalIndex,
        string $legalName,
        string $legalVirtue,
        string $name,
        int $number,
        string $phone,
        string $representative,
        string $representativeNominative,
        string $representativePosition,
    ): Affiliate {
        return $this->commandBus->execute(
            new CreateOrganizationCommand(
                id: (string) Uuid::v4(),
                actualAddress: $actualAddress,
                bank: $bank,
                inn: $inn,
                legalAddress: $legalAddress,
                legalIndex: $legalIndex,
                legalName: $legalName,
                legalVirtue: $legalVirtue,
                name: $name,
                number: $number,
                phone: $phone,
                representative: $representative,
                representativeNominative: $representativeNominative,
                representativePosition: $representativePosition,
            )
        );
    }

    #[Query]
    public function organization(string $id): Organization
    {
        return $this->queryBus->execute(new QueryOrganization($id));
    }
}
