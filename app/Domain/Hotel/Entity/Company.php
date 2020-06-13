<?php

namespace App\Domain\Hotel\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidOrderedTimeGenerator;
use App\Domain\Hotel\Entity\Hotel;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity
 */
class Company
{
    /**
     * Company constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @var uuid_binary_ordered_time
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="uuid_binary_ordered_time", unique=true, nullable=false)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidOrderedTimeGenerator::class)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * One Company has many hotels.
     *
     * @var Hotel[] $hotels
     *
     * @ORM\OneToMany(targetEntity="Hotel", mappedBy="company")
     */
    private $hotels;

    /**
     * Return a list of hotels related to a company.
     *
     * @return Hotel[]
     */
    public function getHotels()
    {
        return $this->hotels;
    }

    /**
     * Return the company name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
