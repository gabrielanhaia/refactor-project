<?php

namespace App\Infrastructure\Doctrine\Context\Hotel\Repository;

use App\Domain\Hotel\Contract\ICompanyRepository;
use App\Domain\Hotel\Entity\Company;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Ramsey\Uuid\Rfc4122\UuidV1;
use Ramsey\Uuid\Uuid;

/**
 * @method Company|null find($id, $lockMode = null, $lockVersion = null)
 * @method Company|null findOneBy(array $criteria, array $orderBy = null)
 * @method Company[]    findAll()
 * @method Company[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyRepository extends ServiceEntityRepository implements ICompanyRepository
{
    /**
     * HotelRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Company::class);
    }

    /**
     * List hotels related to a company..
     *
     * @param Uuid $companyId
     *
     * @return Company|null
     */
    public function listHotels(Uuid $companyId): ?Company
    {
        try {
            $company = $this->find($companyId);
        } catch (\Exception $exception) {
            return null;
        }

        if (empty($company)) {
            return null;
        }

        return $company;
    }

    /**
     * Return a list of companies available.
     *
     * @return array
     */
    public function listCompanies(): array
    {
        $companies = $this->findAll() ?? [];

        return $companies;
    }
}
