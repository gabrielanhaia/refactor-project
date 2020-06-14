<?php


namespace App\Controller;

use App\Application\Hotel\Service\HotelService as HotelApplicationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class WidgetController
 *
 * @package App\Controller
 */
class WidgetController extends AbstractController
{
    /**
     * Get average widget.
     *
     * @Route(
     *     "/widget/{hotelId}",
     *     name="hotel_widget",
     *     requirements={"hotelId"="^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}.js$"}
     * )
     * @param string $hotelId
     *
     * @return Response
     */
    public function averageWidget(string $hotelId)
    {
        $hotelId = str_replace('.js', '', $hotelId);

        $rendered = $this->renderView('widgets/hotel_average.js.twig', ['hotel_id' => $hotelId]);
        $response = new Response($rendered);
        $response->headers->set('Content-Type', 'text/javascript');

        return $response;
    }
}