<?php

namespace App\Entity;

use App\Repository\ArmeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArmeRepository::class)]
class Arme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\OneToOne(mappedBy: 'arme', cascade: ['persist'])]
    private ?Personnage $personnage = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPersonnage(): ?Personnage
    {
        return $this->personnage;
    }

    public function setPersonnage(?Personnage $personnage): static
    {
        // unset the owning side of the relation if necessary
        if ($personnage === null && $this->personnage !== null) {
            $this->personnage->setArme(null);
        }

        // set the owning side of the relation if necessary
        if ($personnage !== null && $personnage->getArme() !== $this) {
            $personnage->setArme($this);
        }

        $this->personnage = $personnage;

        return $this;
    }
}
