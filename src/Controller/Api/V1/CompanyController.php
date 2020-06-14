<?php


namespace App\Controller\Api\V1;

use App\Application\Hotel\Service\HotelService as HotelApplicationService;
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
     * @Route("/api/v1/companies", name="companies_list")
     *
     * @param HotelApplicationService $service
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function listCompanies(HotelApplicationService $service)
    {
        $companiesResult = $service->listCompanies();

        return new JsonResponse(['data' => $companiesResult]);
    }

    /**
     * List of hotels by company Id.
     *
     * @Route(
     *     "/api/v1/companies/{companyId}/hotels",
     *     name="hotel_list",
     *     requirements={"companyId"="^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$"}
     * )
     * @param string $companyId
     * @param HotelApplicationService $service
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function listHotelsByCompany(string $companyId, HotelApplicationService $service)
    {
        $hotels = $service->listHotelsByCompany($companyId);

        return new JsonResponse(['data' => $hotels]);
    }
}