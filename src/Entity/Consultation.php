<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsultationRepository::class)]
class Consultation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Num_carte = null;

    #[ORM\Column(nullable: true)]
    private ?int $Date = null;

    #[ORM\Column]
    private ?int $Poids = null;

    #[ORM\Column(nullable: true)]
    private ?int $tension_artirielle = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumCarte(): ?int
    {
        return $this->Num_carte;
    }

    public function setNumCarte(int $Num_carte): static
    {
        $this->Num_carte = $Num_carte;

        return $this;
    }

    public function getDate(): ?int
    {
        return $this->Date;
    }

    public function setDate(?int $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->Poids;
    }

    public function setPoids(int $Poids): static
    {
        $this->Poids = $Poids;

        return $this;
    }

    public function getTensionArtirielle(): ?int
    {
        return $this->tension_artirielle;
    }

    public function setTensionArtirielle(?int $tension_artirielle): static
    {
        $this->tension_artirielle = $tension_artirielle;

        return $this;
    }
}
