<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OpinionRepository")
 */
class Opinion {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="opinion_id")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Booking", inversedBy="opinions")
     * @ORM\JoinColumn(name="booking_id", referencedColumnName="booking_id")
     */
    private $product;

}
