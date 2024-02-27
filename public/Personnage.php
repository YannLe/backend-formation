<?php

abstract class Personnage
{
    public string $nom;
    public string $race;

    public function __construct(string $nom, string $race)
    {
        $this->nom  = $nom;
        $this->race = $race;
    }

    function sePresenter() : void {
        echo "Je m'appelle $this->nom <br>";
    }
}