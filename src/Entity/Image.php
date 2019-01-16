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

}
