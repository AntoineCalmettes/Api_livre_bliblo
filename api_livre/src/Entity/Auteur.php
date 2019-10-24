<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuteurRepository")
 */
class Auteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ManyToOne;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Nationalite", inversedBy="auteurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Nationalite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getManyToOne(): ?string
    {
        return $this->ManyToOne;
    }

    public function setManyToOne(?string $ManyToOne): self
    {
        $this->ManyToOne = $ManyToOne;

        return $this;
    }

    public function getNationalite(): ?Nationalite
    {
        return $this->Nationalite;
    }

    public function setNationalite(?Nationalite $Nationalite): self
    {
        $this->Nationalite = $Nationalite;

        return $this;
    }
}
