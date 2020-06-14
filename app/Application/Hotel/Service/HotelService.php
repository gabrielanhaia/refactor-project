<?php


namespace App\Application\Hotel\Service;

use App\Domain\Hotel\Entity\Review;
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
     * List hotels in a company.
     *
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

    /**
     * Get the average of reviews by hotel.
     *
     * @param string $hotelUuId
     *
     * @return float
     */
    public function getHotelAverage(string $hotelUuId): float
    {
        $hotelId = UuidV4::fromString($hotelUuId);

        // TODO: Implement it with a custom exeption to catch the NotFound errors to don't expose the wrong resources.

        $average = $this->hotelDomainService->getHotelAverage($hotelId);

        return $average;
    }

    /**
     * List reviews by hotel.
     *
     * @param string $hotelUuId Hotel identity string.
     *
     * @return array|Review[]
     * @throws \Exception
     */
    public function listReviewsByHotel(string $hotelUuId): array
    {
        $hotelId = UuidV4::fromString($hotelUuId);

        $reviews = $this->hotelDomainService->listReviewsByHotel($hotelId);

        // TODO: Implement it with a custom exeption to catch the NotFound errors to don't expose the wrong resources.

        return $reviews;
    }
}