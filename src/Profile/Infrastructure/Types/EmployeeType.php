<?php

declare(strict_types=1);

namespace App\Profile\Infrastructure\Types;

use App\Profile\Domain\Entity\Employee;
use TheCodingMachine\GraphQLite\Annotations\SourceField;
use TheCodingMachine\GraphQLite\Annotations\Type;

#[Type(class: Employee::class)]
#[SourceField(name: 'avatar')]
#[SourceField(name: 'id')]
#[SourceField(name: 'profileUrl')]
#[SourceField(name: 'userId')]
final class EmployeeType
{
}
