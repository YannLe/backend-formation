<?php

class Guerrier extends Personnage implements CombattantInterface
{
    public string $arme;

    private ?string $secret;

    public function __construct(string $nom, string $race, string $arme)
    {
        parent::__construct($nom, $race);
        $this->arme = $arme;
    }

    // Override de la méthode sePresenter
    public function sePresenter()
    {
        parent::sePresenter();
        echo "Et je manie $this->arme.<br>";
    }

    public function combattre()
    {
        echo "$this->nom attaque avec son arme, $this->arme<br>";
    }
}