<?php


namespace App\DataFixtures;

use App\Domain\Hotel\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class CompanyFixture
 *
 * @package App\DataFixtures
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class CompanyFixture extends Fixture
{
    /** @var string MAIN_COMPANY_TEST */
    const MAIN_COMPANY_TEST = 'MAIN_COMPANY_TEST';

    /**
     * Load data fixtures with the passed EntityManager
     */
    public function load(ObjectManager $manager)
    {
        $company1 = new Company('Hotel Alexanderplatz');
        $manager->persist($company1);
        $manager->flush();

        $this->addReference(self::MAIN_COMPANY_TEST, $company1);
    }
}