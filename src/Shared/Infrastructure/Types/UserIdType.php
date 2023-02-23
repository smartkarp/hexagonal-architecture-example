<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Types;

use App\Shared\Domain\ValueObject\UserId;
use TheCodingMachine\GraphQLite\Annotations\SourceField;
use TheCodingMachine\GraphQLite\Annotations\Type;

#[Type(class: UserId::class)]
#[SourceField(name: 'id')]
final class UserIdType
{
}
