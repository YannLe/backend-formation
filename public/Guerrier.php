<?php

class Guerrier extends Personnage implements CombattantInterface
{
    public string $arme;

    public function __construct(string $nom, string $race, string $arme)
    {
        parent::__construct($nom, $race);
        $this->arme = $arme;
    }

    public function sePresenter(): void
    {
        echo "Je suis $this->nom et je manie $this->arme. <br>";
    }

    public function combattre(): void
    {
        echo "$this->nom attaque avec son arme, $this->arme";
    }
}