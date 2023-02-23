<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Controller\Api\Organization;

use App\Company\Application\Command\Organization\CreateOrganizationCommand;
use App\Shared\Application\Command\CommandBusInterface;
use App\Shared\Domain\Service\Uuid;
use JsonException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/organizations/', name: 'api_organization_post', methods: [Request::METHOD_POST])]
final class PostOrganizationAction extends AbstractController
{
    /**
     * @throws JsonException
     */
    public function __invoke(CommandBusInterface $commandBus, Request $request): JsonResponse
    {
        $parameters = json_decode(
            $request->getContent(),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        $commandBus->execute(
            new CreateOrganizationCommand(
                id: (string) Uuid::v4(),
                actualAddress: $parameters['actualAddress'] ?? null,
                bank: $parameters['bank'],
                inn: $parameters['inn'],
                legalAddress: $parameters['legalAddress'],
                legalIndex: $parameters['legalIndex'],
                legalName: $parameters['legalName'],
                legalVirtue: $parameters['legalVirtue'],
                name: $parameters['name'],
                number: $parameters['number'],
                phone: $parameters['phone'],
                representative: $parameters['representative'],
                representativeNominative: $parameters['representativeNominative'],
                representativePosition: $parameters['representativePosition'],
            )
        );

        return new JsonResponse();
    }
}
