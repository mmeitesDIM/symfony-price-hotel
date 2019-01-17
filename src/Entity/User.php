<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="user_id")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="array")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="Image")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="image_id", nullable=true)
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

    public function getId(): ?int {
        return $this->id;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function setEmail(string $email): self {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string {
        return (string)$this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string {
        return (string)$this->password;
    }

    public function setPassword(string $password): self {
        $this->password = $password;

        return $this;
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


    /**
     * @see UserInterface
     */
    public function getSalt() {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials() {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
