<?php

abstract class Personnage
{
    protected string $nom;
    public string $race;

    private ?string $secret = null;

    public function __construct(string $nom, string $race)
    {
        $this->nom  = $nom;
        $this->race = $race;
    }

    public function sePresenter(): void
    {
        echo "Je m'appelle $this->nom <br>";
    }

    public function sePresenterEnConfiance(): void
    {
        $this->sePresenter();
        if ($this->secret) {
            echo $this->revelerUnSecret();
        }
        echo '<br>';
    }

    public function setNom(string $nom): Personnage
    {
        $this->nom = $nom;
        return $this;
    }

    public function getNom(): string
    {
        return trim($this->nom);
    }

    public function ajouterUnSecret(string $secret): static
    {
        $this->secret = $secret;
        return $this;
    }

    private function revelerUnSecret() : string
    {
        return "Mon secret est : $this->secret";
    }

}