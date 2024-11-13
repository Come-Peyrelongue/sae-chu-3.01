<?php

namespace App\Entity;

use App\Repository\SéanceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SéanceRepository::class)]
class Séance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $SéanceID = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $HeureDébut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $HeureFin = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $Notes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSéanceID(): ?int
    {
        return $this->SéanceID;
    }

    public function setSéanceID(int $SéanceID): static
    {
        $this->SéanceID = $SéanceID;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getHeureDébut(): ?\DateTimeInterface
    {
        return $this->HeureDébut;
    }

    public function setHeureDébut(\DateTimeInterface $HeureDébut): static
    {
        $this->HeureDébut = $HeureDébut;

        return $this;
    }

    public function getHeureFin(): ?\DateTimeInterface
    {
        return $this->HeureFin;
    }

    public function setHeureFin(\DateTimeInterface $HeureFin): static
    {
        $this->HeureFin = $HeureFin;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->Notes;
    }

    public function setNotes(?string $Notes): static
    {
        $this->Notes = $Notes;

        return $this;
    }
}
