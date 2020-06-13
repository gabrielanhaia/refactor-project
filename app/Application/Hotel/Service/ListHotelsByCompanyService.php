<?php

namespace App\Application\Hotel\Service;

use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ListHotelsByCompanyService
 *
 * @package App\Application\Hotel\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ListHotelsByCompanyService extends BaseCompanyService
{
    /**
     * @param string $companyUuid
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function execute(string $companyUuid)
    {
        $companyId = Uuid::fromString($companyUuid);

        $hotels = $this->hotelDomainService->listHotelsByCompany($companyId);

        return new JsonResponse($hotels);
    }
}