<?php


namespace App\Application\Hotel\Service;

use App\Domain\Hotel\Service\HotelService as HotelDomainService;
use Ramsey\Uuid\Rfc4122\UuidV1;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Ramsey\Uuid\Uuid;

/**
 * Class BaseCompanyService
 *
 * @package App\Application\Hotel\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class HotelService
{
    /** @var HotelDomainService $hotelDomainService Domain service of hotels. */
    protected $hotelDomainService;

    /**
     * BaseCompanyService constructor.
     *
     * @param HotelDomainService $hotelDomainService
     */
    public function __construct(HotelDomainService $hotelDomainService)
    {
        $this->hotelDomainService = $hotelDomainService;
    }

    /**
     * List all companies available.
     *
     * OBS: Resource created to show all companies and make it easy for testing.
     */
    public function listCompanies(): ?array
    {
        return $this->hotelDomainService->listCompanies();
    }

    /**
     * @param string $companyUuid
     *
     * @return array|null
     * @throws \Exception
     */
    public function listHotelsByCompany(string $companyUuid): ?array
    {
        $companyId = Uuid::fromString($companyUuid);

        $hotels = $this->hotelDomainService->listHotelsByCompany($companyId);

        return $hotels;
    }

    public function getHotelAverage(string $hotelUuid): float
    {
        $hotelId = UuidV4::fromString($hotelUuid);

        $average = $this->hotelDomainService->getHotelAverage($hotelId);

        return $average;
    }
}