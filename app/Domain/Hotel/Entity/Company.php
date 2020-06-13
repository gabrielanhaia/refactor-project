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
     * @var uuid_binary
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="uuid_binary", unique=true, nullable=false)
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
}
