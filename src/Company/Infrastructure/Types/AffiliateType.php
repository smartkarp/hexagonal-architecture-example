<?php

declare(strict_types=1);

namespace App\Company\Infrastructure\Types;

use App\Company\Domain\Entity\Affiliate;
use TheCodingMachine\GraphQLite\Annotations\SourceField;
use TheCodingMachine\GraphQLite\Annotations\Type;

#[Type(class: Affiliate::class)]
#[SourceField(name: 'id')]
#[SourceField(name: 'address')]
#[SourceField(name: 'city')]
#[SourceField(name: 'code')]
#[SourceField(name: 'name')]
#[SourceField(name: 'organization')]
#[SourceField(name: 'phone')]
final class AffiliateType
{
}
