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

    abstract function sePresenter() : void;
}