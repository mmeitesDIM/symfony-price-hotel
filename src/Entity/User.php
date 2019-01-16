<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="user_id")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\OneToOne(targetEntity="Image")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="image_id")
     */
    private $image;

    /**
     * @ORM\OneToOne(targetEntity="Alert", mappedBy="user")
     */
    private $alert;

    /**
     * @ORM\OneToOne(targetEntity="Owner", mappedBy="user")
     */
    private $cart;

    /**
     * @ORM\OneToMany(targetEntity="Bookmark", mappedBy="user")
     */
    private $bookmarks;

    /**
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="user")
     */
    private $bookings;

    /**
     * @ORM\OneToMany(targetEntity="Message", mappedBy="user")
     */
    private $messages;

    public function __construct() {
        $this->bookmarks = new ArrayCollection();
        $this->bookings = new ArrayCollection();
        $this->messages = new ArrayCollection();
    }

}
