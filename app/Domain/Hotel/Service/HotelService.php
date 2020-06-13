<?php


namespace App\Domain\Hotel\Service;


use App\Domain\Hotel\Contract\ICompanyRepository;
use App\Domain\Hotel\Entity\Company;
use App\Domain\Hotel\Entity\Hotel;
use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;

/**
 * Class HotelService
 *
 * @package App\Domain\Hotel\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class HotelService
{
    /** @var ICompanyRepository $companyRepository Repository of companies. */
    private $companyRepository;

    /**
     * HotelService constructor.
     *
     * @param ICompanyRepository $companyRepository
     */
    public function __construct(ICompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Return a list of hotels in a company.
     *
     * @param Uuid $companyId
     *
     * @return array|Hotel[]
     * @throws \Exception
     */
    public function listHotelsByCompany(Uuid $companyId): array
    {
        $company = $this->companyRepository->listHotels($companyId);

        if (empty($company)) {
            // TODO: Implement a custom exception...
            throw new \Exception('Company not found.');
        }

        $hotels = $company->getHotels()->getValues() ?? [];

        return $hotels;
    }

    /**
     * Return a list of all companies.
     *
     * @return array|Company[]
     */
    public function listCompanies(): array
    {
        return $this->companyRepository->listCompanies();
    }
}