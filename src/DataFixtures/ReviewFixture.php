<?php


namespace App\DataFixtures;


use App\Domain\Hotel\Contract\IHotelRepository;
use App\Domain\Hotel\Entity\Hotel;
use App\Domain\Hotel\Entity\Review;
use App\Infrastructure\Doctrine\Context\Hotel\Repository\HotelRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

/**
 * Class ReviewFixture
 *
 * @package App\DataFixtures
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class ReviewFixture extends Fixture implements DependentFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager)
    {
        $hotel1 = $this->getReference(HotelFixture::HOTEL_1);
        $hotel2 = $this->getReference(HotelFixture::HOTEL_2);

        $review = new Review(10, 'Very nice stay', $hotel1);
        $manager->persist($review);

        $review = new Review(9, 'Very nice stay, I enjoyed it a lot.', $hotel1);
        $manager->persist($review);

        $review = new Review(5, 'Avarage.', $hotel1);
        $manager->persist($review);

        $review = new Review(9, '', $hotel1);
        $manager->persist($review);

        $review = new Review(1, 'Worst experience ever.', $hotel1);
        $manager->persist($review);

        $review = new Review(5, 'The receptionist was not smiling.', $hotel2);
        $manager->persist($review);

        $review = new Review(10, 'Very nice stay, the reception was really fast.', $hotel2);
        $manager->persist($review);

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
            HotelFixture::class
        ];
    }
}