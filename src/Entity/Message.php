<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="message_id")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="messages")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Owner", inversedBy="messages")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="owner_id")
     */
    private $owner;

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent(): string {
        return $this->content;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Message
     */
    public function setContent(string $content): self {
        $this->content = $content;
        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser(): User {
        return $this->user;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return Message
     */
    public function setUser(User $user): self {
        $this->user = $user;
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
     * @return Message
     */
    public function setOwner(Owner $owner): self {
        $this->owner = $owner;
        return $this;
    }

}
