<?php

namespace App\Infrastructure\Doctrine\Context\Hotel\Repository;

use App\Domain\Hotel\Contract\IHotelRepository;
use App\Domain\Hotel\Entity\Hotel;
use App\Domain\Hotel\Entity\Review;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Ramsey\Uuid\Doctrine\UuidBinaryOrderedTimeType;
use Ramsey\Uuid\UuidInterface;

/**
 * @method Hotel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hotel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hotel[]    findAll()
 * @method Hotel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HotelRepository extends ServiceEntityRepository implements IHotelRepository
{
    /**
     * HotelRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hotel::class);
    }

    /**
     * Get the total hotel average.
     *
     * @param UuidInterface $hotelId
     *
     * @return float
     */
    public function getTotalHotelAverage(UuidInterface $hotelId): float
    {
        $average = $this->getEntityManager()
            ->createQuery(
                'SELECT AVG(r.score) AS average FROM App\Domain\Hotel\Entity\Review r WHERE r.hotel = :hotel_id GROUP BY r.hotel'
            )
            ->setParameter('hotel_id', $hotelId, UuidBinaryOrderedTimeType::NAME)
            ->getResult();

        $result = isset($average[0]['average']) ? $average[0]['average'] : 0;

        return (float) $result;
    }
}
