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

}