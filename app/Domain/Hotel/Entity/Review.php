<?php

namespace App\Domain\Hotel\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidOrderedTimeGenerator;

/**
 * Review
 *
 * @ORM\Table(name="review")
 * @ORM\Entity
 */
class Review
{
    /**
     * Review constructor.
     *
     * @param int $score
     * @param string|null $comment
     * @param Hotel $hotel
     */
    public function __construct(int $score, string $comment, Hotel $hotel)
    {
        $this->score = $score;
        $this->comment = $comment;
        $this->hotel = $hotel;
    }

    /**
     * @var uuid_binary
     *
     * @ORM\Column(name="id", type="uuid_binary", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidOrderedTimeGenerator::class)
     *
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="score", type="integer", nullable=false)
     */
    private $score;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @var Hotel $hotel
     *
     * @ORM\ManyToOne(targetEntity="Hotel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hotel_id", referencedColumnName="id")
     * })
     */
    private $hotel;
}
