<?php


namespace App\Domain\Hotel\Contract;

use App\Domain\Hotel\Entity\Company;
use Ramsey\Uuid\Uuid;

/**
 * Interface ICompanyRepository
 *
 * @package App\Domain\Hotel\Contract
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
interface ICompanyRepository
{
    /**
     * List hotels related to a company..
     *
     * @param Uuid $companyId
     *
     * @return Company
     */
    public function listHotels(Uuid $companyId): Company;
}