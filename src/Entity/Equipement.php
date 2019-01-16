<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipementRepository")
 */
class Equipement {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="equipement_id")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $equipementType;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imagePath;

    /**
     * @ORM\ManyToOne(targetEntity="Property", inversedBy="equipements")
     * @ORM\JoinColumn(name="property_id", referencedColumnName="property_id")
     */
    private $property;

}
