<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(
            denormalizationContext: ['groups' => ['personnage:create']],
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Patch(
            denormalizationContext: ['groups' => ['personnage:update']],
            security: "is_granted('ROLE_ADMIN')"
        ),
        new Delete(security: "is_granted('ROLE_ADMIN')")
    ]
)]
class Personnage {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string')]
    #[Groups(['personnage:create'])]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'personnages')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['personnage:create'])]
    private ?Race $race = null;

    #[ORM\ManyToMany(targetEntity: Allegeance::class, inversedBy: 'personnages')]
    private Collection $allegeances;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['personnage:create', 'personnage:update'])]
    private ?string $description = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Arme $arme = null;

    public function __construct()
    {
        $this->allegeances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function setNom(string $nom): Personnage
    {
        $this->nom = $nom;
        return $this;
    }

    public function getNom(): string
    {
        return $this->nom;
    }


}