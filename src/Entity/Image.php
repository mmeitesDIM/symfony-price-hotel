<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="image_id")
     */
    private $id;

    /**
     * @ORM\Column(type="blob")
     */
    private $blob;

    /**
     * @ORM\OneToOne(targetEntity="Property", inversedBy="image")
     * @ORM\JoinColumn(name="property_id", referencedColumnName="property_id")
     */
    private $property;

    /**
     * @ORM\ManyToOne(targetEntity="Room", inversedBy="images")
     * @ORM\JoinColumn(name="room_id", referencedColumnName="room_id")
     */
    private $room;

}
