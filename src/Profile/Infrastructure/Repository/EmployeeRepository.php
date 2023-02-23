<?php

declare(strict_types=1);

namespace App\Profile\Infrastructure\Repository;

use App\Profile\Domain\Entity\Employee;
use App\Profile\Domain\Repository\EmployeeRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

final class EmployeeRepository extends ServiceEntityRepository implements EmployeeRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employee::class);
    }

    public function find($id, $lockMode = null, $lockVersion = null): ?Employee
    {
        return parent::find($id, $lockMode, $lockVersion);
    }

    public function remove(Employee $employee): void
    {
        $this->_em->remove($employee);
        $this->_em->flush();
    }

    public function save(Employee $employee): void
    {
        $this->_em->persist($employee);
        $this->_em->flush();
    }
}
