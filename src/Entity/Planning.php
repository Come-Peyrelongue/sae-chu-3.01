<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanningRepository::class)]
class Planning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $PlanningID = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $HeureDébut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $HeureFin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlanningID(): ?int
    {
        return $this->PlanningID;
    }

    public function setPlanningID(int $PlanningID): static
    {
        $this->PlanningID = $PlanningID;

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
}
