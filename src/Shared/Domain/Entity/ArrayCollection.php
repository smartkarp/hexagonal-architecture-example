<?php

declare(strict_types=1);

namespace App\Shared\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection as DoctrineArrayCollection;

final class ArrayCollection extends DoctrineArrayCollection implements Collection
{
}
