<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Controller\Api\Affiliate;

use App\Company\Application\Command\Affiliate\CreateAffiliateCommand;
use App\Company\Application\Query\Organization\QueryOrganization;
use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Application\Query\QueryBusInterface;
use App\Shared\Domain\Service\Uuid;
use JsonException;
use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use function sprintf;

#[Route('/api/affiliates/', name: 'api_affiliate_post', methods: [Request::METHOD_POST])]
final class PostAffiliateAction extends AbstractController
{
    /**
     * @throws JsonException
     */
    public function __invoke(
        CommandBusInterface $commandBus,
        QueryBusInterface $queryBus,
        Request $request
    ): JsonResponse {
        $parameters = json_decode(
            $request->getContent(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $organization = $queryBus->execute(new QueryOrganization($parameters['organization']));

        if (!$organization) {
            throw new LogicException(sprintf('Organization with ID: "%s" not found.', $parameters['organization']));
        }

        $commandBus->execute(
            new CreateAffiliateCommand(
                address: $parameters['address'],
                code: $parameters['code'],
                city: $parameters['city'] ?? null,
                id: (string) Uuid::v4(),
                name: $parameters['name'],
                organization: $organization,
                phone: $parameters['phone'],
            )
        );

        return new JsonResponse();
    }
}
