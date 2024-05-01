<?php

namespace App\Entity;

use App\Repository\RDVRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RDVRepository::class)]
class RDV
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $NumRDV = null;

    #[ORM\Column(nullable: true)]
    private ?int $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumRDV(): ?int
    {
        return $this->NumRDV;
    }

    public function setNumRDV(?int $NumRDV): static
    {
        $this->NumRDV = $NumRDV;

        return $this;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(?int $date): static
    {
        $this->date = $date;

        return $this;
    }
}
