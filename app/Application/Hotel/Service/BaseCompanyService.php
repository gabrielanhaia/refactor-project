<?php


namespace App\Application\Hotel\Service;

use App\Domain\Hotel\Service\HotelService;

/**
 * Class BaseCompanyService
 *
 * @package App\Application\Hotel\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
abstract class BaseCompanyService
{
    /** @var HotelService $hotelDomainService Domain service of hotels. */
    protected $hotelDomainService;

    /**
     * BaseCompanyService constructor.
     *
     * @param HotelService $hotelDomainService
     */
    public function __construct(HotelService $hotelDomainService)
    {
        $this->hotelDomainService = $hotelDomainService;
    }
}