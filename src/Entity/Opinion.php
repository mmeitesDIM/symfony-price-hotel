<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OpinionRepository")
 */
class Opinion {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="opinion_id")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="float")
     */
    private $rated;

    /**
     * @ORM\ManyToOne(targetEntity="Booking", inversedBy="opinions")
     * @ORM\JoinColumn(name="booking_id", referencedColumnName="booking_id")
     */
    private $booking;

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Opinion
     */
    public function setMessage(string $message): self {
        $this->message = $message;
        return $this;
    }

    /**
     * Get rated
     *
     * @return float
     */
    public function getRated(): float {
        return $this->rated;
    }

    /**
     * Set rated
     *
     * @param float $rated
     * @return Opinion
     */
    public function setRated(float $rated): self {
        $this->rated = $rated;
        return $this;
    }

    /**
     * Get booking
     *
     * @return Booking
     */
    public function getBooking(): Booking {
        return $this->booking;
    }

    /**
     * Set booking
     *
     * @param Booking $booking
     * @return Opinion
     */
    public function setBooking(Booking $booking): self {
        $this->booking = $booking;
        return $this;
    }

}
