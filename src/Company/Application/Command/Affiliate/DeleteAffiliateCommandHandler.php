<?php

declare(strict_types=1);

namespace App\Company\Application\Command\Affiliate;

use App\Company\Domain\Repository\AffiliateRepositoryInterface;
use App\Shared\Application\Command\CommandHandlerInterface;
use App\Shared\Application\Exception\GraphQLException;
use function sprintf;

final class DeleteAffiliateCommandHandler implements CommandHandlerInterface
{
    public function __construct(
        private readonly AffiliateRepositoryInterface $affiliateRepository,
    ) {
    }

    /**
     * @throws GraphQLException
     */
    public function __invoke(DeleteAffiliateCommand $command): string
    {
        if (!$affiliate = $this->affiliateRepository->find($command->id)) {
            throw new GraphQLException(
                sprintf('Affiliate with ID:"%s" not found.', $command->id),
                400,
                null,
                'VALIDATION',
                ['field' => 'id']
            );
        }

        $this->affiliateRepository->remove($affiliate);

        return $affiliate->getId();
    }
}
