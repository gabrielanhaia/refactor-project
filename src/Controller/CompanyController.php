<?php


namespace App\Controller;

use App\Application\Hotel\Service\ListCompaniesService;
use App\Application\Hotel\Service\ListHotelsByCompanyService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CompanyController
 *
 * @package App\Controller
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CompanyController extends AbstractController
{
    /**
     * List of companies available.
     *
     * @Route("/api/companies", name="companies_list")
     * @param Request $request
     *
     * @param ListCompaniesService $service
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function getCompanies(ListCompaniesService $service)
    {
        return $service->execute();
    }

    /**
     * List of hotels by company Id.
     *
     * @Route("/api/companies/{companyId}/hotels", name="hotel_list")
     * @param string $companyId
     * @param ListHotelsByCompanyService $service
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function getHotels(string $companyId, ListHotelsByCompanyService $service)
    {
        return $service->execute($companyId);
    }
}