<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShareRoomRepository")
 */
class ShareRoom extends Property {

    /**
     * Number of place leaving
     *
     * @ORM\Column(type="integer")
     */
    private $placeLeaving;

    /**
     * Get placeLeaving
     *
     * @return int
     */
    public function getPlaceLeaving(): ?int {
        return $this->placeLeaving;
    }

    /**
     * Set placeLeaving
     *
     * @param int $placeLeaving
     * @return ShareRoom
     */
    public function setPlaceLeaving(int $placeLeaving): self {
        $this->placeLeaving = $placeLeaving;
        return $this;
    }

}