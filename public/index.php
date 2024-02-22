<?php

/** @var Array<array<string>> $personnages */
$personnages = [
    ['nom' => 'Frodo', 'race' => 'Hobbit', 'allégeance' => 'La Comté'],
    ['nom' => 'Aragorn', 'race' => 'Humain', 'allégeance' => 'Gondor'],
    ['nom' => 'Legolas', 'race' => 'Elfe', 'allégeance' => 'Forêt Noire'],
    ['nom' => 'Gimli', 'race' => 'Nain', 'allégeance' => 'Moria'],
    ['nom' => 'Gandalf', 'race' => 'Istar', 'allégeance' => 'Les peuples libres'],
];

$nomRecherche = 'Gandalf';
foreach ($personnages as $nom => $personnage) {
    switch ($personnage['nom']) {
        case $nomRecherche :
        {
            echo " $nomRecherche allège à {$personnage['allégeance']}";
            echo '<br>';
            break 2;
        }
        case 'Frodo' :
        {
            echo "C'est le porteur de l'anneau";
            echo '<br>';
            break;
        }
        default:
            echo "Je passe dans mon switch <br>";
            break;
    }
}

echo "<br>";
foreach ($personnages as $nom => $personnage) {
    echo " $nom est de la race des {$personnage['race']} et allège à {$personnage['allégeance']}";
    echo "<br>";
}



