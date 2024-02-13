<?php
class Personnage {
    public string $nom;
    public string $race;

    // Constructeur pour initialiser les objets
    public function __construct(string $nom, string $race) {
        $this->nom = $nom;
        $this->race = $race;
    }

    // Méthode pour afficher les informations du personnage
    public function sePresenter() {
        echo "Bonjour, je suis $this->nom de la race des $this->race.<br>";
    }
}

// Création d'instances de la classe Personnage
$frodon = new Personnage('Frodon', 'Hobbit');
$aragorn = new Personnage('Aragorn', 'Humain');

// Invocation de la méthode sePresenter sur les instances
$frodon->sePresenter();
$aragorn->sePresenter();

