<?php


namespace App\Application\Hotel\Service;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class ListCompaniesService
 *
 * @package App\Application\Hotel\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ListCompaniesService extends BaseCompanyService
{
    /**
     * List all companies available.
     *
     * OBS: Resource created to show all companies and make it easy for testing.
     */
    public function execute()
    {
        $companies = $this->hotelDomainService->listCompanies();

        return new JsonResponse($companies);
    }
}