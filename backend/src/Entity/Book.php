<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
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
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=30, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=30, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=30, nullable=false)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=30, nullable=false)
     */
    private $cover;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=30, nullable=false)
     */
    private $language;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float", precision=10, scale=0, nullable=false)
     */
    private $value;

    /**
     * @var \Author
     *
     * @ORM\ManyToOne(targetEntity="Author")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_author", referencedColumnName="id")
     * })
     */
    private $idAuthor;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="added")
     * @ORM\JoinTable(name="adders",
     *                  joinColumns={@ORM\JoinColumn(name="id_book",
     *                  referencedColumnName="id")},
     *                  inverseJoinColumns={@ORM\JoinColumn(name="id_user",referencedColumnName="id")})
     */
    private $adders;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="owned")
     * @ORM\JoinTable(name="adders",
     *                  joinColumns={@ORM\JoinColumn(name="id_book",
     *                  referencedColumnName="id")},
     *                  inverseJoinColumns={@ORM\JoinColumn(name="id_user",referencedColumnName="id")})
     */
    private $owners;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="orders")
     * @ORM\JoinTable(name="adders",
     *                  joinColumns={@ORM\JoinColumn(name="id_book",
     *                  referencedColumnName="id")},
     *                  inverseJoinColumns={@ORM\JoinColumn(name="id_user",referencedColumnName="id")})
     */
    private $orders;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="books")
     */
    private $categories;

    public function __construct()
    {
        $this->adders = new ArrayCollection();
        $this->owners = new ArrayCollection();
        $this->orders = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    /**
     * @return Collection|User[]
     */
    public function getAdders(): Collection
    {
        return $this->adders;
    }

    public function addAdder(User $adder): self
    {
        if (!$this->adders->contains($adder)) {
            $this->adders[] = $adder;
            $adder->addAdded($this);
        }

        return $this;
    }

    public function removeAdder(User $adder): self
    {
        if ($this->adders->removeElement($adder)) {
            $adder->removeAdded($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getOwners(): Collection
    {
        return $this->owners;
    }

    public function addOwner(User $owner): self
    {
        if (!$this->owners->contains($owner)) {
            $this->owners[] = $owner;
            $owner->addOwned($this);
        }

        return $this;
    }

    public function removeOwner(User $owner): self
    {
        if ($this->owners->removeElement($owner)) {
            $owner->removeOwned($this);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(User $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->addOrder($this);
        }

        return $this;
    }

    public function removeOrder(User $order): self
    {
        if ($this->orders->removeElement($order)) {
            $order->removeOrder($this);
        }

        return $this;
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


}
