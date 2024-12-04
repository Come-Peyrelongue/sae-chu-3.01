<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $PatientID = null;

    #[ORM\Column(length: 40)]
    private ?string $Nom = null;

    #[ORM\Column(length: 40)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $Pathologie = null;

    #[ORM\Column(length: 30)]
    private ?string $Login = null;

    #[ORM\Column(length: 50)]
    private ?string $Password = null;

    #[ORM\OneToMany(targetEntity: Séance::class, mappedBy: 'patient')]
    private Collection $séance;

    public function __construct()
    {
        $this->séance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatientID(): ?int
    {
        return $this->PatientID;
    }

    public function setPatientID(int $PatientID): static
    {
        $this->PatientID = $PatientID;

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

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getPathologie(): ?string
    {
        return $this->Pathologie;
    }

    public function setPathologie(?string $Pathologie): static
    {
        $this->Pathologie = $Pathologie;

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
    public function getSéance(): Collection
    {
        return $this->séance;
    }

    public function addSAnce(Séance $sAnce): static
    {
        if (!$this->séance->contains($sAnce)) {
            $this->séance->add($sAnce);
            $sAnce->setPatient($this);
        }

        return $this;
    }

    public function removeSAnce(Séance $sAnce): static
    {
        if ($this->séance->removeElement($sAnce)) {
            // set the owning side to null (unless already changed)
            if ($sAnce->getPatient() === $this) {
                $sAnce->setPatient(null);
            }
        }

        return $this;
    }
}
