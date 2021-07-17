<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $points;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_admin;

    /**
     * @ORM\ManyToMany(targetEntity=Book::class, inversedBy="adders")
     * @ORM\JoinTable(name="adders",
     *                  joinColumns={@ORM\JoinColumn(name="id_user",
     *                  referencedColumnName="id")},
     *                  inverseJoinColumns={@ORM\JoinColumn(name="id_book",referencedColumnName="id")})
     */
    private $added;

    /**
     * @ORM\ManyToMany(targetEntity=Book::class, inversedBy="owners")
     * @ORM\JoinTable(name="owners",
     *                  joinColumns={@ORM\JoinColumn(name="id_user",
     *                  referencedColumnName="id")},
     *                  inverseJoinColumns={@ORM\JoinColumn(name="id_book",referencedColumnName="id")})
     */
    private $owned;

    /**
     * @ORM\ManyToMany(targetEntity=Book::class, inversedBy="orders")
     * @ORM\JoinTable(name="orders",
     *                  joinColumns={@ORM\JoinColumn(name="id_user",
     *                  referencedColumnName="id")},
     *                  inverseJoinColumns={@ORM\JoinColumn(name="id_book",referencedColumnName="id")})
     */
    private $orders;

    /**
     * @ORM\ManyToMany(targetEntity=Subscription::class, inversedBy="users")
     * @ORM\JoinTable(name="invoices",
     *                  joinColumns={@ORM\JoinColumn(name="id_user",
     *                  referencedColumnName="id")},
     *                  inverseJoinColumns={@ORM\JoinColumn(name="id_subscription",referencedColumnName="id")})
     */
    private $subscriptions;

    /**
     * @ORM\OneToMany(targetEntity=Ebook::class, mappedBy="user")
     */
    private $ebooks;

    public function __construct()
    {
        $this->added = new ArrayCollection();
        $this->owned = new ArrayCollection();
        $this->orders = new ArrayCollection();
        $this->subscriptions = new ArrayCollection();
        $this->ebooks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles[] = 'ROLE_USER';
        if ($this->is_admin) {
            $roles[] = 'ADMIN';
        }
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPoints(): ?float
    {
        return $this->points;
    }

    public function setPoints(?float $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getIsAdmin(): ?bool
    {
        return $this->is_admin;
    }

    public function setIsAdmin(?bool $is_admin): self
    {
        $this->is_admin = $is_admin;

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getAdded(): Collection
    {
        return $this->added;
    }

    public function addAdded(Book $added): self
    {
        if (!$this->added->contains($added)) {
            $this->added[] = $added;
        }

        return $this;
    }

    public function removeAdded(Book $added): self
    {
        $this->added->removeElement($added);

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getOwned(): Collection
    {
        return $this->owned;
    }

    public function addOwned(Book $owned): self
    {
        if (!$this->owned->contains($owned)) {
            $this->owned[] = $owned;
        }

        return $this;
    }

    public function removeOwned(Book $owned): self
    {
        $this->owned->removeElement($owned);

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Book $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
        }

        return $this;
    }

    public function removeOrder(Book $order): self
    {
        $this->orders->removeElement($order);

        return $this;
    }

    /**
     * @return Collection|Subscription[]
     */
    public function getSubscriptions(): Collection
    {
        return $this->subscriptions;
    }

    public function addSubscription(Subscription $subscription): self
    {
        if (!$this->subscriptions->contains($subscription)) {
            $this->subscriptions[] = $subscription;
        }

        return $this;
    }

    public function removeSubscription(Subscription $subscription): self
    {
        $this->subscriptions->removeElement($subscription);

        return $this;
    }

    /**
     * @return Collection|Ebook[]
     */
    public function getEbooks(): Collection
    {
        return $this->ebooks;
    }

    public function addEbook(Ebook $ebook): self
    {
        if (!$this->ebooks->contains($ebook)) {
            $this->ebooks[] = $ebook;
            $ebook->setUser($this);
        }

        return $this;
    }

    public function removeEbook(Ebook $ebook): self
    {
        if ($this->ebooks->removeElement($ebook)) {
            // set the owning side to null (unless already changed)
            if ($ebook->getUser() === $this) {
                $ebook->setUser(null);
            }
        }

        return $this;
    }
}
