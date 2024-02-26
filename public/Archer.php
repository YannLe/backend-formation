<?php

class Archer extends Personnage
{
    use Combattant;
    public int $nbFleches;

    public function __construct(string $nom, string $race, int $nbFleches = 20)
    {
        parent::__construct($nom, $race);
        $this->nbFleches = $nbFleches;
    }

    public function sePresenter(): void
    {
        parent::sePresenter();
        echo "Et je tire avec mon arc. Il me reste $this->nbFleches flèches. <br>";
    }

}