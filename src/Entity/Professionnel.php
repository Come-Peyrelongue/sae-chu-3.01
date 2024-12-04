<?php

namespace App\Entity;

use App\Repository\ProfessionnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessionnelRepository::class)]
class Professionnel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ProfessionnelID = null;

    #[ORM\Column(length: 40)]
    private ?string $Nom = null;

    #[ORM\Column(length: 60)]
    private ?string $Spécialité = null;

    #[ORM\Column(length: 30)]
    private ?string $Login = null;

    #[ORM\Column(length: 50)]
    private ?string $Password = null;

    #[ORM\OneToMany(targetEntity: Séance::class, mappedBy: 'professionnel')]
    private Collection $scéance;

    public function __construct()
    {
        $this->Scéance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfessionnelID(): ?int
    {
        return $this->ProfessionnelID;
    }

    public function setProfessionnelID(int $ProfessionnelID): static
    {
        $this->ProfessionnelID = $ProfessionnelID;

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

    public function getSpécialité(): ?string
    {
        return $this->Spécialité;
    }

    public function setSpécialité(string $Spécialité): static
    {
        $this->Spécialité = $Spécialité;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->Login;
    }

    public function setLogin(string $Login): static
    {
        $this->Login = $Login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): static
    {
        $this->Password = $Password;

        return $this;
    }

    /**
     * @return Collection<int, Séance>
     */
    public function getScéance(): Collection
    {
        return $this->Scéance;
    }

    public function addScéance(Séance $scAnce): static
    {
        if (!$this->Scéance->contains($scAnce)) {
            $this->Scéance->add($scAnce);
            $scAnce->setProfessionnel($this);
        }

        return $this;
    }

    public function removeScéance(Séance $scAnce): static
    {
        if ($this->Scéance->removeElement($scAnce)) {
            // set the owning side to null (unless already changed)
            if ($scAnce->getProfessionnel() === $this) {
                $scAnce->setProfessionnel(null);
            }
        }

        return $this;
    }
}
