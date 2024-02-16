<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Personnage {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string')]
    public string $nom;

    #[ORM\ManyToOne(inversedBy: 'personnages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Race $race = null;

    #[ORM\ManyToMany(targetEntity: Allegeance::class, inversedBy: 'personnages')]
    private Collection $allegeances;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Arme $arme = null;

    public function __construct()
    {
        $this->allegeances = new ArrayCollection();
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): static
    {
        $this->race = $race;

        return $this;
    }

    /**
     * @return Collection<int, Allegeance>
     */
    public function getAllegeances(): Collection
    {
        return $this->allegeances;
    }

    public function addAllegeance(Allegeance $allegeance): static
    {
        if (!$this->allegeances->contains($allegeance)) {
            $this->allegeances->add($allegeance);
        }

        return $this;
    }

    public function removeAllegeance(Allegeance $allegeance): static
    {
        $this->allegeances->removeElement($allegeance);

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getArme(): ?Arme
    {
        return $this->arme;
    }

    public function setArme(?Arme $arme): static
    {
        $this->arme = $arme;

        return $this;
    }

}