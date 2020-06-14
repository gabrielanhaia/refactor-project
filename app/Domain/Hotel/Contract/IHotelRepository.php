<?php


namespace App\Domain\Hotel\Contract;

use App\Domain\Hotel\Entity\Company;
use App\Domain\Hotel\Entity\Hotel;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface IHotelRepository
 *
 * @package App\Domain\Hotel\Contract
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
interface IHotelRepository
{
    /**
     * Get the total hotel average.
     *
     * @param UuidInterface $hotelId
     *
     * @return float
     */
    public function getTotalHotelAverage(UuidInterface $hotelId): float;

    /**
     * Return a hotel by id.
     *
     * @param UuidInterface $hotelId
     *
     * @return Hotel|null
     */
    public function getHotel(UuidInterface $hotelId): ?Hotel;
}