<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column]
    public ?int $num_carte = null;

    #[ORM\Column(length: 255)]
    public ?string $nom = null;

    #[ORM\Column(length: 255)]
    public ?string $prenom = null;

    #[ORM\Column]
    public ?int $date_de_naissance = null;

    #[ORM\Column(nullable: true)]
    public ?int $num_telephone = null;

    #[ORM\Column(length: 255)]
    public ?string $E_mail = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumCarte(): ?int
    {
        return $this->num_carte;
    }

    public function setNumCarte(int $num_carte): static
    {
        $this->num_carte = $num_carte;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?int
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(int $date_de_naissance): static
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getNumTelephone(): ?int
    {
        return $this->num_telephone;
    }

    public function setNumTelephone(?int $num_telephone): static
    {
        $this->num_telephone = $num_telephone;

        return $this;
    }

    public function getEMail(): ?string
    {
        return $this->E_mail;
    }

    public function setEMail(string $E_mail): static
    {
        $this->E_mail = $E_mail;

        return $this;
    }
}
