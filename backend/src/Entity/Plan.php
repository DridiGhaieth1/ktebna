<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Plan
 *
 * @ORM\Table(name="plan")
 * @ORM\Entity
 */
class Plan
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
     * @ORM\Column(name="name", type="string", length=30, nullable=false)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity=Feature::class, inversedBy="plans")
     */
    private $featues;

    /**
     * @ORM\OneToMany(targetEntity=Subscription::class, mappedBy="plan")
     */
    private $subscriptions;

    public function __construct()
    {
        $this->featues = new ArrayCollection();
        $this->subscriptions = new ArrayCollection();
    }

    /**
     * @return Collection|Feature[]
     */
    public function getFeatues(): Collection
    {
        return $this->featues;
    }

    public function addFeatue(Feature $featue): self
    {
        if (!$this->featues->contains($featue)) {
            $this->featues[] = $featue;
        }

        return $this;
    }

    public function removeFeatue(Feature $featue): self
    {
        $this->featues->removeElement($featue);

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
            $subscription->setPlan($this);
        }

        return $this;
    }

    public function removeSubscription(Subscription $subscription): self
    {
        if ($this->subscriptions->removeElement($subscription)) {
            // set the owning side to null (unless already changed)
            if ($subscription->getPlan() === $this) {
                $subscription->setPlan(null);
            }
        }

        return $this;
    }


}
