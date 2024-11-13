<?php

namespace App\Entity;

use App\Repository\RessourceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RessourceRepository::class)]
class Ressource
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $RessourceID = null;

    #[ORM\Column(length: 40)]
    private ?string $Nom = null;

    #[ORM\Column(length: 60)]
    private ?string $Type = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRessourceID(): ?int
    {
        return $this->RessourceID;
    }

    public function setRessourceID(int $RessourceID): static
    {
        $this->RessourceID = $RessourceID;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): static
    {
        $this->Type = $Type;

        return $this;
    }
}
