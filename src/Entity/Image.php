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
     * Get id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * get blob
     *
     * @return mixed
     */
    public function getBlob() {
        return $this->blob;
    }

    /**
     * Set blob
     *
     * @param $blob
     * @return Image
     */
    public function setBlob($blob): self {
        $this->blob = $blob;
        return $this;
    }

}
