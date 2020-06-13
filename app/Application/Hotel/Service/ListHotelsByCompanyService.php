<?php

namespace App\Application\Hotel\Service;

use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

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
        try {
            $companyId = Uuid::fromString($companyUuid);
            $hotels = $this->hotelDomainService->listHotelsByCompany($companyId);
        } catch (\Exception $exception) {
            return new JsonResponse([], Response::HTTP_NOT_FOUND);
        }

        return new JsonResponse($hotels);
    }
}