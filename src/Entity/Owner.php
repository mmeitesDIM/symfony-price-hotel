<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OwnerRepository")
 */
class Owner {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="owner_id")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="owner")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $customer;

    /**
     * @ORM\OneToMany(targetEntity="Property", mappedBy="owner")
     */
    private $properties;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="owner")
     */
    private $messages;

    public function __construct() {
        $this->properties = new ArrayCollection();
        $this->messages = new ArrayCollection();
    }

}