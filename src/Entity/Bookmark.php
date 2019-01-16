<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookmarkRepository")
 */
class Bookmark {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="bookmark_id")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="bookmarks")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Property", inversedBy="bookmarks")
     * @ORM\JoinColumn(name="property_id", referencedColumnName="property_id")
     */
    private $property;

}