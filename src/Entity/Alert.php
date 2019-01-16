<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlertRepository")
 */
class Alert {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="alert_id")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="alert")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="Offer", inversedBy="alert")
     * @ORM\JoinColumn(name="offer_id", referencedColumnName="offer_id")
     */
    private $offer;

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
     * @return Alert
     */
    public function setUser(User $user): self {
        $this->user = $user;
        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice(): int {
        return $this->price;
    }

    /**
     * Set price
     *
     * @param int $price
     * @return Alert
     */
    public function setPrice(int $price): self {
        $this->price = $price;
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
     * @return Alert
     */
    public function setOffer(Offer $offer): self {
        $this->offer = $offer;
        return $this;
    }

}
