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

}
