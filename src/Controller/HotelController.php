<?php


namespace App\Controller;

use App\Application\Hotel\Service\HotelService as HotelApplicationService;
use App\Application\Hotel\Service\ListCompaniesService;
use App\Application\Hotel\Service\ListHotelsByCompanyService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HotelController
 *
 * @package App\Controller
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class HotelController extends AbstractController
{
    /**
     * Get the hotel average.
     *
     * @Route(
     *     "/api/hotels/{hotelId}/avarage",
     *     name="hotel_average",
     *     requirements={"hotelId"="^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$"}
     * )
     * @param string $hotelId
     * @param HotelApplicationService $service
     *
     * @return JsonResponse
     */
    public function getAverage(string $hotelId, HotelApplicationService $service)
    {
        $average = $service->getHotelAverage($hotelId);

        return new JsonResponse([
            'data' => ['avarage' => $average]
        ]);
    }

    /**
     * Get the hotel reviews.
     *
     * @Route(
     *     "/api/hotels/{hotelId}/reviews",
     *     name="hotel_reviews",
     *     requirements={"hotelId"="^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$"}
     * )
     * @param string $hotelId
     * @param HotelApplicationService $service
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function getReviews(string $hotelId, HotelApplicationService $service)
    {
        $reviews = $service->listReviewsByHotel($hotelId);

        return new JsonResponse([
            'data' => $reviews
        ]);
    }
}