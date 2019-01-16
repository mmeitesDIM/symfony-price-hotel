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

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Get roomType
     *
     * @return string
     */
    public function getRoomType(): string {
        return $this->room_type;
    }

    /**
     * Set roomType
     *
     * @param string $room_type
     * @return Room
     */
    public function setRoomType(string $room_type): self {
        $this->room_type = $room_type;
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
     * @return Room
     */
    public function setProperty(Property $property): self {
        $this->property = $property;
        return $this;
    }

    /**
     * Get images
     *
     * @return ArrayCollection
     */
    public function getImages(): ArrayCollection {
        return $this->images;
    }

    /**
     * Set images
     *
     * @param ArrayCollection $images
     * @return Room
     */
    public function setImages(ArrayCollection $images): self {
        $this->images = $images;
        return $this;
    }

    /**
     * Add image to images
     *
     * @param Image $image
     * @return Room
     */
    public function addImage(Image $image): self {
        $this->images->add($image);
        return $this;
    }

}
