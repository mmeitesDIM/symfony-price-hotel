<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoomRepository")
 */
class Room {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="room_id")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $room_type;

    /**
     * @ORM\ManyToOne(targetEntity="Property", inversedBy="rooms")
     * @ORM\JoinColumn(name="property_id", referencedColumnName="property_id")
     */
    private $property;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="room")
     */
    private $images;

    public function __construct() {
        $this->images = new ArrayCollection();
    }

}
