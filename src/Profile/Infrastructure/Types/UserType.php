<?php

declare(strict_types=1);

namespace App\Profile\Infrastructure\Types;

use App\Profile\Domain\Entity\User;
use TheCodingMachine\GraphQLite\Annotations\SourceField;
use TheCodingMachine\GraphQLite\Annotations\Type;

#[Type(class: User::class)]
#[SourceField(name: 'firstName')]
#[SourceField(name: 'id')]
#[SourceField(name: 'lastName')]
#[SourceField(name: 'patronymic')]
#[SourceField(name: 'username')]
final class UserType
{
}
