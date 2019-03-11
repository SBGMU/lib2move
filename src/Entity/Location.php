<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocationRepository")
 */
class Location
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateLocation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateFin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="locations")
     */
    private $User;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vehicule", mappedBy="Id")
     */
    private $Vehicule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $VilleDarriver;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $VilleDepart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PrixTotal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Vehicule", inversedBy="locations")
     */
    private $IdVehicule;

    public function __construct()
    {
        $this->Vehicule = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateLocation(): ?\DateTimeInterface
    {
        return $this->DateLocation;
    }

    public function setDateLocation(\DateTimeInterface $DateLocation): self
    {
        $this->DateLocation = $DateLocation;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(\DateTimeInterface $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(\DateTimeInterface $DateFin): self
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    /**
     * @return Collection|Vehicule[]
     */
    public function getVehicule(): Collection
    {
        return $this->Vehicule;
    }

    public function addVehicule(Vehicule $vehicule): self
    {
        if (!$this->Vehicule->contains($vehicule)) {
            $this->Vehicule[] = $vehicule;
            $vehicule->setId($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): self
    {
        if ($this->Vehicule->contains($vehicule)) {
            $this->Vehicule->removeElement($vehicule);
            // set the owning side to null (unless already changed)
            if ($vehicule->getId() === $this) {
                $vehicule->setId(null);
            }
        }

        return $this;
    }

    public function getVilleDarriver(): ?string
    {
        return $this->VilleDarriver;
    }

    public function setVilleDarriver(string $VilleDarriver): self
    {
        $this->VilleDarriver = $VilleDarriver;

        return $this;
    }

    public function getVilleDepart(): ?string
    {
        return $this->VilleDepart;
    }

    public function setVilleDepart(string $VilleDepart): self
    {
        $this->VilleDepart = $VilleDepart;

        return $this;
    }

    public function getPrixTotal(): ?string
    {
        return $this->PrixTotal;
    }

    public function setPrixTotal(string $PrixTotal): self
    {
        $this->PrixTotal = $PrixTotal;

        return $this;
    }

    public function getIdVehicule(): ?Vehicule
    {
        return $this->IdVehicule;
    }

    public function setIdVehicule(?Vehicule $IdVehicule): self
    {
        $this->IdVehicule = $IdVehicule;

        return $this;
    }
}
