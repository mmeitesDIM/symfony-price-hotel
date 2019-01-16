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
    private $owner;

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
     * @return User
     */
    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    /**
     * Get bookmarks
     *
     * @return ArrayCollection
     */
    public function getBookmarks(): ArrayCollection {
        return $this->bookmarks;
    }

    /**
     * Set bookmarks
     *
     * @param ArrayCollection $bookmarks
     * @return User
     */
    public function setBookmarks(ArrayCollection $bookmarks): self {
        $this->bookmarks = $bookmarks;
        return $this;
    }

    /**
     * Add bookmark to bookmarks
     *
     * @param Bookmark $bookmark
     * @return User
     */
    public function addBookmark(Bookmark $bookmark): self {
        $this->bookmarks->add($bookmark);
        return $this;
    }

    /**
     * Get messages
     *
     * @return ArrayCollection
     */
    public function getMessages(): ArrayCollection {
        return $this->messages;
    }

    /**
     * Set messages
     *
     * @param ArrayCollection $messages
     * @return User
     */
    public function setMessages(ArrayCollection $messages): self {
        $this->messages = $messages;
        return $this;
    }

    /**
     * Add message to messages
     *
     * @param Message $message
     * @return User
     */
    public function addMessage(Message $message): self {
        $this->messages->add($message);
        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail(): string {
        return $this->mail;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return User
     */
    public function setMail(string $mail): self {
        $this->mail = $mail;
        return $this;
    }

    /**
     * Get image
     *
     * @return Image
     */
    public function getImage(): Image {
        return $this->image;
    }

    /**
     * Set image
     *
     * @param Image $image
     * @return User
     */
    public function setImage(Image $image): self {
        $this->image = $image;
        return $this;
    }

    /**
     * Get alert
     *
     * @return Alert
     */
    public function getAlert(): Alert {
        return $this->alert;
    }

    /**
     * Set alert
     *
     * @param Alert $alert
     * @return User
     */
    public function setAlert(Alert $alert): self {
        $this->alert = $alert;
        return $this;
    }

    /**
     * Get owner
     *
     * @return Owner
     */
    public function getOwner(): Owner {
        return $this->owner;
    }

    /**
     * Set owner
     *
     * @param Owner $owner
     * @return User
     */
    public function setOwner(Owner $owner): self {
        $this->owner = $owner;
        return $this;
    }

    /**
     * Get bookings
     *
     * @return ArrayCollection
     */
    public function getBookings(): ArrayCollection {
        return $this->bookings;
    }

    /**
     * Set bookings
     *
     * @param ArrayCollection $bookings
     * @return User
     */
    public function setBookings(ArrayCollection $bookings): self {
        $this->bookings = $bookings;
        return $this;
    }

    /**
     * Add booking to bookings
     *
     * @param Booking $booking
     * @return User
     */
    public function addBooking(Booking $booking): self {
        $this->bookings->add($booking);
        return $this;
    }

}