<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PropertyRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="property_type", type="string")
 */
abstract class Property {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="property_id")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $postalCode;
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $country;

    /**
     * @ORM\Column(type="integer")
     */
    protected $surface;

    /**
     * @ORM\Column(type="integer")
     */
    protected $bedNumber;

    /**
     * @ORM\Column(type="float")
     */
    protected $avgRated;

    /**
     * Many properties have one user. This is the owning side.
     *
     * @ORM\ManyToOne(targetEntity="Owner", inversedBy="properties")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="owner_id")
     */
    protected $owner;

    /**
     * One Property has One Image.
     *
     * @ORM\OneToOne(targetEntity="Image")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="image_id")
     */
    protected $image;

    /**
     * One Property has many offers. This is the inverse side.
     *
     * @ORM\OneToMany(targetEntity="Offer", mappedBy="property")
     */
    protected $offers;

    /**
     * One Property has many bookmarks. This is the inverse side.
     *
     * @ORM\OneToMany(targetEntity="Bookmark", mappedBy="property")
     */
    protected $bookmarks;

    /**
     * One Property has many rooms. This is the inverse side.
     *
     * @ORM\OneToMany(targetEntity="Room", mappedBy="property")
     */
    protected $rooms;

    /**
     * One Property has many equipements. This is the inverse side.
     *
     * @ORM\OneToMany(targetEntity="Equipement", mappedBy="property")
     */
    protected $equipements;

    public function __construct() {
        $this->offers = new ArrayCollection();
        $this->bookmarks = new ArrayCollection();
        $this->rooms = new ArrayCollection();
        $this->equipements = new ArrayCollection();
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
     * Get name
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Property
     */
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress(): string {
        return $this->address;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Property
     */
    public function setAddress(string $address): self {
        $this->address = $address;
        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode(): string {
        return $this->postalCode;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     * @return Property
     */
    public function setPostalCode(string $postalCode): self {
        $this->postalCode = $postalCode;
        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity(): string {
        return $this->city;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Property
     */
    public function setCity(string $city): self {
        $this->city = $city;
        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry(): string {
        return $this->country;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Property
     */
    public function setCountry(string $country): self {
        $this->country = $country;
        return $this;
    }

    /**
     * Get owner
     *
     * @return Owner
     */
    public function getOwner(): Owner {
        return $this->owner;
    }

    /**
     * Set owner
     *
     * @param Owner $owner
     * @return Property
     */
    public function setOwner(Owner $owner): self {
        $this->owner = $owner;
        return $this;
    }

    /**
     * Get offers
     *
     * @return ArrayCollection
     */
    public function getOffers(): ArrayCollection {
        return $this->offers;
    }

    /**
     * Set offers
     *
     * @param ArrayCollection $offers
     * @return Property
     */
    public function setOffers(ArrayCollection $offers): self {
        $this->offers = $offers;
        return $this;
    }

    /**
     * Add offer to offers
     *
     * @param Offer $offer
     * @return Property
     */
    public function addOffer(Offer $offer): self {
        $this->offers->add($offer);
        return $this;
    }

    /**
     * Get bookmarks
     *
     * @return ArrayCollection
     */
    public function getBookmarks(): ArrayCollection {
        return $this->bookmarks;
    }

    /**
     * Set bookmarks
     *
     * @param ArrayCollection $bookmarks
     * @return Property
     */
    public function setBookmarks(ArrayCollection $bookmarks): self {
        $this->bookmarks = $bookmarks;
        return $this;
    }

    /**
     * Add bookmark to bookmarks
     *
     * @param Bookmark $bookmark
     * @return Property
     */
    public function addBookmark(Bookmark $bookmark): self {
        $this->bookmarks->add($bookmark);
        return $this;
    }

    /**
     * Get surface
     *
     * @return int
     */
    public function getSurface(): int {
        return $this->surface;
    }

    /**
     * Set surface
     *
     * @param int $surface
     * @return Property
     */
    public function setSurface(int $surface): self {
        $this->surface = $surface;
        return $this;
    }

    /**
     * Get bedNumber
     *
     * @return int
     */
    public function getBedNumber(): int {
        return $this->bedNumber;
    }

    /**
     * Set bedNumber
     *
     * @param int $bedNumber
     * @return Property
     */
    public function setBedNumber(int $bedNumber): self {
        $this->bedNumber = $bedNumber;
        return $this;
    }

    /**
     * Get avgRated
     *
     * @return float
     */
    public function getAvgRated(): float {
        return $this->avgRated;
    }

    /**
     * Set avgRated
     *
     * @param float $avgRated
     * @return Property
     */
    public function setAvgRated(float $avgRated): self {
        $this->avgRated = $avgRated;
        return $this;
    }

    /**
     * Get image
     *
     * @return Image
     */
    public function getImage(): Image {
        return $this->image;
    }

    /**
     * Set image
     *
     * @param Image $image
     * @return Property
     */
    public function setImage(Image $image): self {
        $this->image = $image;
        return $this;
    }

    /**
     * Get rooms
     *
     * @return ArrayCollection
     */
    public function getRooms(): ArrayCollection {
        return $this->rooms;
    }

    /**
     * Set rooms
     *
     * @param ArrayCollection $rooms
     * @return Property
     */
    public function setRooms(ArrayCollection $rooms): self {
        $this->rooms = $rooms;
        return $this;
    }

    /**
     * Add room to rooms
     *
     * @param Room $room
     * @return Property
     */
    public function addRoom(Room $room): self {
        $this->rooms->add($room);
        return $this;
    }

    /**
     * Get equipements
     *
     * @return ArrayCollection
     */
    public function getEquipements(): ArrayCollection {
        return $this->equipements;
    }

    /**
     * Set equipements
     *
     * @param ArrayCollection $equipements
     * @return Property
     */
    public function setEquipements(ArrayCollection $equipements): self {
        $this->equipements = $equipements;
        return $this;
    }

    /**
     * Add equipement to equipements
     *
     * @param Equipement $equipement
     * @return Property
     */
    public function addEquipements(Equipement $equipement): self {
        $this->bookmarks->add($equipement);
        return $this;
    }

}