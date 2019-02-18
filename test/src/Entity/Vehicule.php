<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehiculeRepository")
 */
class Vehicule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numSerie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $immatriculation;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbKm;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAchat;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixAchat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Location", inversedBy="Vehicule")
     */
    private $Id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumSerie(): ?int
    {
        return $this->numSerie;
    }

    public function setNumSerie(int $numSerie): self
    {
        $this->numSerie = $numSerie;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): self
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getNbKm(): ?int
    {
        return $this->nbKm;
    }

    public function setNbKm(int $nbKm): self
    {
        $this->nbKm = $nbKm;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getPrixAchat(): ?int
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(int $prixAchat): self
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function setId(?Location $Id): self
    {
        $this->Id = $Id;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }
}
