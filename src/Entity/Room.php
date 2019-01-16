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
     * @ORM\ManyToMany(targetEntity="Image")
     * @ORM\JoinTable(name="room_images",
     *      joinColumns={@ORM\JoinColumn(name="room_id", referencedColumnName="room_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="image_id", referencedColumnName="image_id", unique=true)}
     *     )
     */
    private $images;

    public function __construct() {
        $this->images = new ArrayCollection();
    }

}
