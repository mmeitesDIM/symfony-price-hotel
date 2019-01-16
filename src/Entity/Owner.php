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
     * @ORM\Column(type="string", length=255)
     */
    private $rib;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="owner")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;

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
     * @return Owner
     */
    public function setUser(User $user): self {
        $this->user = $user;
        return $this;
    }

    /**
     * Get rib
     *
     * @return string
     */
    public function getRib(): string {
        return $this->rib;
    }

    /**
     * Set rib
     *
     * @param string $rib
     * @return Owner
     */
    public function setRib(string $rib): self {
        $this->rib = $rib;
        return $this;
    }

    /**
     * Get properties
     *
     * @return ArrayCollection
     */
    public function getProperties(): ArrayCollection {
        return $this->properties;
    }

    /**
     * Set properties
     *
     * @param ArrayCollection $properties
     * @return Owner
     */
    public function setProperties(ArrayCollection $properties): self {
        $this->properties = $properties;
        return $this;
    }

    /**
     * Add property to properties
     *
     * @param Property $property
     * @return Owner
     */
    public function addProperty(Property $property): self {
        $this->properties->add($property);
        return $this;
    }

    /**
     * Get messages
     *
     * @return ArrayCollection
     */
    public function getMessages(): ArrayCollection {
        return $this->messages;
    }

    /**
     * Set messages
     *
     * @param ArrayCollection $messages
     * @return Owner
     */
    public function setMessages(ArrayCollection $messages): self {
        $this->messages = $messages;
        return $this;
    }

    /**
     * Add message to messages
     *
     * @param Message $message
     * @return Owner
     */
    public function addMessage(Message $message): self {
        $this->messages->add($message);
        return $this;
    }

}