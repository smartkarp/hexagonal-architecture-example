<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Controller;

use App\Company\Application\Command\Affiliate\CreateAffiliateCommand;
use App\Company\Application\Command\Affiliate\DeleteAffiliateCommand;
use App\Company\Application\Query\Affiliate\QueryAffiliate;
use App\Company\Domain\Entity\Affiliate;
use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Application\Query\QueryBusInterface;
use App\Shared\Domain\Service\Uuid;
use TheCodingMachine\GraphQLite\Annotations\Mutation;
use TheCodingMachine\GraphQLite\Annotations\Query;
use TheCodingMachine\GraphQLite\Types\ID;

final class AffiliateController
{
    public function __construct(
        private readonly CommandBusInterface $commandBus,
        private readonly QueryBusInterface $queryBus,
    ) {
    }

    #[Query]
    public function affiliate(string $id): Affiliate
    {
        return $this->queryBus->execute(new QueryAffiliate($id));
    }

    #[Mutation]
    public function createAffiliate(
        string $address,
        string $code,
        ?string $city,
        string $name,
        ID $organization,
        string $phone,
    ): Affiliate {
        return $this->commandBus->execute(
            new CreateAffiliateCommand(
                address: $address,
                code: $code,
                city: $city,
                id: (string) Uuid::v4(),
                name: $name,
                organization: $organization->val(),
                phone: $phone
            )
        );
    }

    #[Mutation]
    public function deleteAffiliate(ID $id): string
    {
        return $this->commandBus->execute(new DeleteAffiliateCommand($id->val()));
    }
}
