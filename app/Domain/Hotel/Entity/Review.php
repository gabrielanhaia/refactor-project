<?php

namespace App\Domain\Hotel\Entity;


use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidOrderedTimeGenerator;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReviewRepository")
 *
 * @author Gabriel Anhaia <anhaia.gabriel@gmail.com>
 */
class Review
{
    /**
     * @var \Ramsey\Uuid\UuidInterface $id
     *
     * @ORM\Id
     * @ORM\Column(type="uuid_binary", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidOrderedTimeGenerator::class)
     */
    private $id;

    /**
     * @var \Ramsey\Uuid\UuidInterface $hotel_id
     *
     * @ORM\Column(type="uuid_binary")
     */
    private $hotel_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $score;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getHotelId()
    {
        return $this->hotel_id;
    }

    /**
     * @param $hotel_id
     *
     * @return $this
     */
    public function setHotelId($hotel_id)
    {
        $this->hotel_id = $hotel_id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getScore(): ?int
    {
        return $this->score;
    }

    /**
     * @param int $score
     *
     * @return $this
     */
    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     *
     * @return $this
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
}
