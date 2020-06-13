<?php

namespace App\Domain\Hotel\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidOrderedTimeGenerator;

/**
 * Hotel
 *
 * @ORM\Table(name="hotel", indexes={@ORM\Index(name="company_id", columns={"company_id"})})
 * @ORM\Entity
 */
class Hotel
{
    /**
     * Hotel constructor.
     *
     * @param string $name
     * @param string|null $address
     * @param Company $company
     */
    public function __construct(string $name, string $address, Company $company)
    {
        $this->name = $name;
        $this->address = $address;
        $this->company = $company;
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
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var Company $company
     *
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     * })
     */
    private $company;

    /**
     * One Hotel has many reviews.
     *
     * @var Review[] $reviews
     *
     * @ORM\OneToMany(targetEntity="Review", mappedBy="hotel")
     */
    private $reviews;
}
