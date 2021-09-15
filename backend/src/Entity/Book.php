<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Book
 * @ApiResource(formats={"json"}, normalizationContext={ "groups": {"books"} })
 * @ORM\Table(name="book", indexes={@ORM\Index(name="id_author", columns={"id_author"})})
 * @ORM\Entity
 */
class Book
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"books"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=30, nullable=false)
     * @Groups({"books"})
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=30, nullable=false)
     * @Groups({"books"})
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     * @Groups({"books"})
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=30, nullable=false)
     * @Groups({"books"})
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=30, nullable=false)
     * @Groups({"books"})
     */
    private $cover;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=30, nullable=false)
     * @Groups({"books"})
     */
    private $language;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     * @Groups({"books"})
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float", precision=10, scale=0, nullable=false)
     * @Groups({"books"})
     */
    private $value;

    /**
     * @var \Author
     *
     * @ORM\ManyToOne(targetEntity="Author", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_author", referencedColumnName="id")
     * })
     * @Groups({"books"})
     */
    private $idAuthor;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="books")
     * @Groups({"books"})
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="book")
     * @Groups({"books"})
     */
    private $orders;

    /**
     * @ORM\OneToMany(targetEntity=Adders::class, mappedBy="book")
     * @Groups({"books"})
     */
    private $adders;

    /**
     * @ORM\OneToMany(targetEntity=Owners::class, mappedBy="book")
     * @Groups({"books"})
     */
    private $owners;

    public function __construct()
    {
        $this->adders = new ArrayCollection();
        $this->owners = new ArrayCollection();
        $this->orders = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setBook($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getBook() === $this) {
                $order->setBook(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Adders[]
     */
    public function getAdders(): Collection
    {
        return $this->adders;
    }

    public function addAdder(Adders $adder): self
    {
        if (!$this->adders->contains($adder)) {
            $this->adders[] = $adder;
            $adder->setBook($this);
        }

        return $this;
    }

    public function removeAdder(Adders $adder): self
    {
        if ($this->adders->removeElement($adder)) {
            // set the owning side to null (unless already changed)
            if ($adder->getBook() === $this) {
                $adder->setBook(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Owners[]
     */
    public function getOwners(): Collection
    {
        return $this->owners;
    }

    public function addOwner(Owners $owner): self
    {
        if (!$this->owners->contains($owner)) {
            $this->owners[] = $owner;
            $owner->setBook($this);
        }

        return $this;
    }

    public function removeOwner(Owners $owner): self
    {
        if ($this->owners->removeElement($owner)) {
            // set the owning side to null (unless already changed)
            if ($owner->getBook() === $this) {
                $owner->setBook(null);
            }
        }

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getIdAuthor(): ?Author
    {
        return $this->idAuthor;
    }

    public function setIdAuthor(?Author $idAuthor): self
    {
        $this->idAuthor = $idAuthor;

        return $this;
    }


}
