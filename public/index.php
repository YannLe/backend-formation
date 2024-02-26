<?php


$membresExpedition = [
    ['nom' => 'Frodo', 'propriété' => ['Porteur de l\'anneau', 'Hobbit'], 'age' => 50],
    ['nom' => 'Sam', 'propriété' => ['Jardinier', 'Hobbit'], 'age' => 38],
    ['nom' => 'Aragorn', 'propriété' => ['Protecteur', 'Humain'], 'age' => 87],
    ['nom' => 'Gandalf', 'propriété' => ['Magicien', 'Conseiller'], 'age' => 2019],
    ['nom' => 'Legolas', 'propriété' => ['Archer', 'Elfe'], 'age' => 2931],
    ['nom' => 'Gimli', 'propriété' => ['Nain', 'Guerrier'], 'age' => 139],
];

usort($membresExpedition, static function ($a, $b) {
    //Spaceship operator
    return $a['age'] <=> $b['age'];
});


//Affichage des membres de l'expedition trié par âge
foreach ($membresExpedition as $membre) {
    echo "Nom : {$membre['nom']}, Âge: {$membre['age']} <br>";
}


