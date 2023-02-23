<?php

declare(strict_types=1);

namespace App\Company\Application\Command\Affiliate;

use App\Company\Application\Query\Organization\QueryOrganization;
use App\Company\Domain\Entity\Affiliate;
use App\Company\Domain\Factory\AffiliateFactory;
use App\Company\Domain\Repository\AffiliateRepositoryInterface;
use App\Shared\Application\Command\CommandHandlerInterface;
use App\Shared\Application\Exception\GraphQLException;
use App\Shared\Application\Query\QueryBusInterface;
use function sprintf;

final class CreateAffiliateCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private readonly AffiliateRepositoryInterface $affiliateRepository,
        private readonly AffiliateFactory $affiliateFactory,
        private readonly QueryBusInterface $queryBus,
    ) {
    }

    /**
     * @throws GraphQLException
     */
    public function __invoke(CreateAffiliateCommand $command): Affiliate
    {
        $organization = $this->queryBus->execute(new QueryOrganization($command->organization));

        if (!$organization) {
            throw new GraphQLException(
                sprintf('Organization with ID:"%s" not found.', $organization),
                400,
                null,
                'VALIDATION',
                ['field' => 'organization']
            );
        }

        $affiliate = $this->affiliateFactory->create(
            address: $command->address,
            code: $command->code,
            city: $command->city,
            id: $command->id,
            name: $command->name,
            organization: $organization,
            phone: $command->phone,
        );

        $this->affiliateRepository->save($affiliate);

        return $affiliate;
    }
}
