<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Types;

use App\Company\Domain\Entity\Organization;
use TheCodingMachine\GraphQLite\Annotations\SourceField;
use TheCodingMachine\GraphQLite\Annotations\Type;

#[Type(class: Organization::class)]
#[SourceField(name: 'id')]
#[SourceField(name: 'actualAddress')]
#[SourceField(name: 'affiliates')]
#[SourceField(name: 'bank')]
#[SourceField(name: 'inn')]
#[SourceField(name: 'legalAddress')]
#[SourceField(name: 'legalIndex')]
#[SourceField(name: 'legalName')]
#[SourceField(name: 'legalVirtue')]
#[SourceField(name: 'name')]
#[SourceField(name: 'number')]
#[SourceField(name: 'phone')]
#[SourceField(name: 'representative')]
#[SourceField(name: 'representativeNominative')]
#[SourceField(name: 'representativePosition')]
final class OrganizationType
{
}
