<?php


namespace App\Controller;

use App\Application\Hotel\Service\ListHotelsByCompanyService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
     * List of hotels by company Id.
     *
     * @Route("/api/hotels", name="hotel_list")
     * @param Request $request
     *
     * @param ListHotelsByCompanyService $service
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @throws \Exception
     */
    public function getHotels(Request $request, ListHotelsByCompanyService $service)
    {
        return $service->execute('2452a8aa-ad92-11ea-b52b-0242ac1e0003');
    }
}