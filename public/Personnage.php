<?php

class Personnage
{
    public string $nom;
    public string $race;

    public function __construct(string $nom, string $race)
    {
        $this->nom  = $nom;
        $this->race = $race;
    }

    public function sePresenter()
    {
        echo "Bonjour, je suis $this->nom, de la race des $this->race. <br>";
    }
}