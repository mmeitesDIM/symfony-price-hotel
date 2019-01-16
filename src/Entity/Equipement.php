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

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Equipement
     */
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): string {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Equipement
     */
    public function setDescription(string $description): self {
        $this->description = $description;
        return $this;
    }

    /**
     * Get equipementType
     *
     * @return string
     */
    public function getEquipementType(): string {
        return $this->equipementType;
    }

    /**
     * Set equipementType
     *
     * @param string $equipementType
     * @return Equipement
     */
    public function setEquipementType(string $equipementType): self {
        $this->equipementType = $equipementType;
        return $this;
    }

    /**
     * Get imagePath
     *
     * @return string
     */
    public function getImagePath(): string {
        return $this->imagePath;
    }

    /**
     * Set imagePath
     *
     * @param string $imagePath
     * @return Equipement
     */
    public function setImagePath(string $imagePath): self {
        $this->imagePath = $imagePath;
        return $this;
    }

    /**
     * Get property
     *
     * @return Property
     */
    public function getProperty(): Property {
        return $this->property;
    }

    /**
     * Set property
     * @param Property $property
     * @return Equipement
     */
    public function setProperty(Property $property): self {
        $this->property = $property;
        return $this;
    }

}
