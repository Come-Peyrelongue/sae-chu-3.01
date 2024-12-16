<?php

namespace App\Entity;

use App\Repository\DisponibiliteRessourceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DisponibiliteRessourceRepository::class)]
class DisponibiliteRessource
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $DisponibiliteRessourceID = null;

    #[ORM\Column(length: 20)]
    private ?string $JourSemaine = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $HeureDebut = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $HeureFin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDisponibiliteRessourceID(): ?int
    {
        return $this->DisponibiliteRessourceID;
    }

    public function setDisponibiliteRessourceID(int $DisponibiliteRessourceID): static
    {
        $this->DisponibiliteRessourceID = $DisponibiliteRessourceID;

        return $this;
    }

    public function getJourSemaine(): ?string
    {
        return $this->JourSemaine;
    }

    public function setJourSemaine(string $JourSemaine): static
    {
        $this->JourSemaine = $JourSemaine;

        return $this;
    }

    public function getHeureDebut(): ?\DateTimeInterface
    {
        return $this->HeureDebut;
    }

    public function setHeureDebut(\DateTimeInterface $HeureDebut): static
    {
        $this->HeureDebut = $HeureDebut;

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
