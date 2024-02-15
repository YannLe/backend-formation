<?php

abstract class Personnage
{
    public string $nom;
    public string $race;

    private ?string $secret = null;

    public function __construct(string $nom, string $race)
    {
        $this->nom = $nom;
        $this->race = $race;
    }

    public function sePresenter()
    {
        echo "Je suis $this->nom de la race des $this->race.<br>";
    }
    public function sePrésenterEnConfiance()
    {
        $this->sePresenter();
        if ($this->secret) {
          echo $this->revelerSecret();
        }
        echo '<br>';
    }


    public function ajouterUnSecret(string $secret)
    {
        $this->secret = $secret;
    }

    private function revelerSecret(): string
    {
        return "Mon secret est : $this->secret";
    }
}