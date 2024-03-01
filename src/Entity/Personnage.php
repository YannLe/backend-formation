<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Repository\PersonnageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonnageRepository::class)]
#[ApiResource(
    operations: [
        new Post(),
        new GetCollection(),
        new Get()
    ]
)]
#[ApiFilter(
    SearchFilter::class, strategy: 'exact', properties: ['arme.nom']
)]
class Personnage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?Race $race = null;

    #[ORM\ManyToMany(targetEntity: Allegeance::class, inversedBy: 'personnages')]
    private Collection $allegeances;

    #[ORM\OneToOne(inversedBy: 'personnage', cascade: ['persist'])]
    private ?Arme $arme = null;

    public function __construct()
    {
        $this->allegeances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
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
