<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FullHouseRepository")
 */
class FullHouse extends Property {

    /**
     * Number of room
     *
     * @ORM\Column(type="integer")
     */
    private $roomNumber;

    /**
     * Get roomNumber
     *
     * @return int
     */
    public function getRoomNumber(): ?int {
        return $this->roomNumber;
    }

    /**
     * Set roomNumber
     *
     * @param int $roomNumber
     * @return FullHouse
     */
    public function setRoomNumber(int $roomNumber): self {
        $this->roomNumber = $roomNumber;
        return $this;
    }

}