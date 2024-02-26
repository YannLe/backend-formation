<?php

class Archer extends Personnage implements CombattantInterface
{
    public int $nbFleches;

    public function __construct(string $nom, string $race, int $nbFleches = 20)
    {
        parent::__construct($nom, $race);
        $this->nbFleches = $nbFleches;
    }

    public function sePresenter(): void
    {
        echo "Je suis $this->nom et je tire avec mon arc. Il me reste $this->nbFleches flèches. <br>";
    }

    public function combattre(): void
    {
        $this->tirerAvecArc();
        echo "$this->nom tire avec son arc, il lui reste $this->nbFleches flèches.";
    }

    private function tirerAvecArc()
    {
        --$this->nbFleches;
    }
}