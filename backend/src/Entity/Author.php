<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Author
 * @ApiResource(formats={"json"})
 * @ORM\Table(name="author", indexes={@ORM\Index(name="id", columns={"id"})})
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */

class Author
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     * @Groups({"books"})
     */
    private $name;

    /**
     * @var float
     * @ORM\Column(name="points", type="float", precision=10, scale=0, nullable=false)
     */
    private $points;

    /**
     * @var string|null
     * @ORM\Column(name="picture", type="string", length=30, nullable=true)
     */
    private $picture;

    /**
     * @var string|null
     * @ORM\Column(name="country", type="string", length=30, nullable=true)
     */
    private $country;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPoints(): ?float
    {
        return $this->points;
    }

    public function setPoints(float $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }


}
