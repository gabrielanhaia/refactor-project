<?php


namespace App\DataFixtures;

use App\Domain\Hotel\Entity\Hotel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use phpDocumentor\Reflection\Types\Self_;
use Ramsey\Uuid\Uuid;

/**
 * Class HotelFixture
 *
 * @package App\DataFixtures
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class HotelFixture extends Fixture
{
    /** @var string HOTEL_2 */
    public const HOTEL_1 = 'HOTEL_1';

    /** @var string HOTEL_2 */
    public const HOTEL_2 = 'HOTEL_2';

    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager)
    {
        $hotel1 = new Hotel();
        $hotel1->setName('Hotel Alexanderplatz 1');
        $hotel1->setAddress('Alexanderplatz, 1, Berlin');

        $manager->persist($hotel1);
        $this->addReference(self::HOTEL_1, $hotel1);

        $hotel2 = new Hotel();
        $hotel2->setName('Hotel Alexanderplatz 2');
        $hotel2->setAddress('Alexanderplatz, 2, Berlin');

        $manager->persist($hotel2);
        $this->addReference(self::HOTEL_2, $hotel2);

        $hotel = new Hotel();
        $hotel->setName('Hotel Alexanderplatz 3');
        $hotel->setAddress('Alexanderplatz, 3, Berlin');

        $manager->persist($hotel);

        $hotel = new Hotel();
        $hotel->setName('Hotel Alexanderplatz 4');
        $hotel->setAddress('Alexanderplatz, 4, Berlin');

        $manager->persist($hotel);

        $hotel = new Hotel();
        $hotel->setName('Hotel Alexanderplatz 5');
        $hotel->setAddress('Alexanderplatz, 5, Berlin');

        $manager->persist($hotel);

        $manager->flush();
    }
}