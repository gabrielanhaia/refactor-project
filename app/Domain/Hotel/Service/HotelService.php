<?php


namespace App\Domain\Hotel\Service;


use App\Domain\Hotel\Contract\ICompanyRepository;

/**
 * Class HotelService
 *
 * @package App\Domain\Hotel\Service
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class HotelService
{
    /** @var ICompanyRepository $companyRepository Repository of companies. */
    private $companyRepository;

    /**
     * HotelService constructor.
     *
     * @param ICompanyRepository $companyRepository
     */
    public function __construct(ICompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }
}