<?php

namespace App\Domain\Hotel\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;
use Ramsey\Uuid\Doctrine\UuidOrderedTimeGenerator;

/**
 * Review
 *
 * @ORM\Table(name="review")
 * @ORM\Entity
 */
class Review implements JsonSerializable
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
     * Specify data which should be serialized to JSON.
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *               which is a value of any type other than a resource.
     *
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'score' => $this->score,
            'comment' => $this->comment
        ];
    }

    /**
     * @var uuid_binary_ordered_time
     *
     * @ORM\Column(name="id", type="uuid_binary_ordered_time", nullable=false)
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
