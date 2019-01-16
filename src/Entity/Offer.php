<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OfferRepository")
 */
class Offer {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="offer_id")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $startDate;

    /**
     * @ORM\Column(type="date")
     */
    private $endDate;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="Property", inversedBy="offers")
     * @ORM\JoinColumn(name="property_id", referencedColumnName="property_id")
     */
    private $property;

    /**
     * @ORM\OneToMany(targetEntity="Alert", mappedBy="offer")
     */
    private $alerts;

    /**
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="offer")
     */
    private $bookings;

    public function __construct() {
        $this->alerts = new ArrayCollection();
        $this->bookings = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate(): \DateTime {
        return $this->startDate;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Offer
     */
    public function setStartDate(\DateTime $startDate): self {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate(): \DateTime {
        return $this->endDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Offer
     */
    public function setEndDate(\DateTime $endDate): self {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice(): int {
        return $this->price;
    }

    /**
     * Set price
     *
     * @param int $price
     * @return Offer
     */
    public function setPrice(int $price): self {
        $this->price = $price;
        return $this;
    }

    /**
     * Get property
     *
     * @return Property
     */
    public function getProperty(): Property {
        return $this->property;
    }

    /**
     * Set property
     * @param Property $property
     * @return Offer
     */
    public function setProperty(Property $property): self {
        $this->property = $property;
        return $this;
    }

    /**
     * Get alerts
     *
     * @return ArrayCollection
     */
    public function getAlerts(): ArrayCollection {
        return $this->alerts;
    }

    /**
     * Set alerts
     *
     * @param ArrayCollection $alerts
     * @return Offer
     */
    public function setAlerts(ArrayCollection $alerts): self {
        $this->alerts = $alerts;
        return $this;
    }

    /**
     * Add alert to alerts
     *
     * @param Alert $alert
     * @return Offer
     */
    public function addAlert(Alert $alert): self {
        $this->alerts->add($alert);
        return $this;
    }

    /**
     * Get bookings
     *
     * @return ArrayCollection
     */
    public function getBookings(): ArrayCollection {
        return $this->bookings;
    }

    /**
     * Set bookings
     *
     * @param ArrayCollection $bookings
     * @return Offer
     */
    public function setBookings(ArrayCollection $bookings): self {
        $this->bookings = $bookings;
        return $this;
    }

    /**
     * Add booking to bookings
     *
     * @param Booking $booking
     * @return Offer
     */
    public function addBooking(Booking $booking): self {
        $this->bookings->add($booking);
        return $this;
    }

}