<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
 */
class Booking {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="booking_id")
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
    private $totalPrice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $payed;

    /**
     * @ORM\OneToMany(targetEntity="Opinion", mappedBy="booking")
     */
    private $opinions;

    /**
     * @ORM\ManyToOne(targetEntity="Offer", inversedBy="bookings")
     * @ORM\JoinColumn(name="offer_id", referencedColumnName="offer_id")
     */
    private $offer;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="bookings")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;

    public function __construct() {
        $this->opinions = new ArrayCollection();
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
     * Get user
     *
     * @return User
     */
    public function getUser(): User {
        return $this->user;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return Booking
     */
    public function setUser(User $user): self {
        $this->user = $user;
        return $this;
    }

    /**
     * Get totalPrice
     *
     * @return int
     */
    public function getTotalPrice(): int {
        return $this->totalPrice;
    }

    /**
     * Set totalPrice
     *
     * @param int $totalPrice
     * @return Booking
     */
    public function setTotalPrice(int $totalPrice): self {
        $this->totalPrice = $totalPrice;
        return $this;
    }

    /**
     * Get offer
     *
     * @return Offer
     */
    public function getOffer(): Offer {
        return $this->offer;
    }

    /**
     * Set offer
     *
     * @param Offer $offer
     * @return Booking
     */
    public function setOffer(Offer $offer): self {
        $this->offer = $offer;
        return $this;
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
     * @return Booking
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
     * @return Booking
     */
    public function setEndDate(\DateTime $endDate): self {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * Get payed
     *
     * @return bool
     */
    public function getPayed(): bool {
        return $this->payed;
    }

    /**
     * Set payed
     * @param bool $payed
     * @return Booking
     */
    public function setPayed(bool $payed): self {
        $this->payed = $payed;
        return $this;
    }

    /**
     * Get opinions
     *
     * @return ArrayCollection
     */
    public function getOpinions(): ArrayCollection {
        return $this->opinions;
    }

    /**
     * Set opinions
     *
     * @param ArrayCollection $opinions
     * @return Booking
     */
    public function setOpinions(ArrayCollection $opinions): self {
        $this->opinions = $opinions;
        return $this;
    }

    /**
     * Add opinion to opinions
     *
     * @param Opinion $opinion
     * @return Booking
     */
    public function addOpinion(Opinion $opinion): self {
        $this->opinions->add($opinion);
        return $this;
    }

}