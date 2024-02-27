<?php

class Magicien extends Personnage implements CombattantInterface
{
    public string $sort;

    public function __construct(string $nom, string $race, string $sort)
    {
        parent::__construct($nom, $race);
        $this->sort = $sort;
    }

    public function sePresenter(): void
    {
        echo "Je suis $this->nom et je lance '$this->sort'. <br>";
    }


    public function combattre(): void
    {
        echo "$this->nom lance le sort '$this->sort'";
    }
}