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
     * @ORM\ManyToOne(targetEntity="Owner", inversedBy="properties")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="owner_id")
     */
    protected $owner;

    /**
     * @ORM\OneToMany(targetEntity="Offer", mappedBy="offer")
     */
    protected $offers;

    /**
     * @ORM\OneToMany(targetEntity="Bookmark", mappedBy="property")
     */
    protected $bookmarks;

    public function __construct() {
        $this->offers = new ArrayCollection();
        $this->bookmarks = new ArrayCollection();
    }

}