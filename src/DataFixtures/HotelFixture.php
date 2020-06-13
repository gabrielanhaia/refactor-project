<?php


namespace App\DataFixtures;

use App\Domain\Hotel\Entity\Hotel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;


/**
 * Class HotelFixture
 *
 * @package App\DataFixtures
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class HotelFixture extends Fixture implements DependentFixtureInterface
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
        $company = $this->getReference(CompanyFixture::MAIN_COMPANY_TEST);

        $hotel1 = new Hotel('Hotel 1', 'Alexanderplatz, 111, Berlin', $company);
        $manager->persist($hotel1);
        $this->addReference(self::HOTEL_1, $hotel1);

        $hotel2 = new Hotel('Hotel 2', 'Alexanderplatz, 222, Berlin', $company);
        $manager->persist($hotel2);
        $this->addReference(self::HOTEL_2, $hotel2);

        $hotel = new Hotel('Hotel 3', 'Alexanderplatz, 333, Berlin', $company);
        $manager->persist($hotel);

        $hotel = new Hotel('Hotel 4', 'Alexanderplatz, 444, Berlin', $company);
        $manager->persist($hotel);

        $hotel = new Hotel('Hotel 5', 'Alexanderplatz, 555, Berlin', $company);
        $manager->persist($hotel);

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return class-string[]
     */
    public function getDependencies()
    {
        return [
            CompanyFixture::class
        ];
    }
}