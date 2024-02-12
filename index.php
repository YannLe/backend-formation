<?php

$personnage = 'Frodo';
$anneeNaissance = 2968;
$taille = 107.9;
$estUnHobbit = true;

echo "Nom du personnage : $personnage <br>";
echo "Année de naissance : $anneeNaissance <br>";
echo "Taille : $taille cm <br>";
echo 'Est-ce un hobbit ? ';
if ($estUnHobbit) {
    echo "Oui";
} else {
    echo "Non";
}

echo "<br>";

$taille = 102.5;
echo "Nouvelle taile : $taille cm <br>";

$nomComplet = $personnage . 'Sacquet';
echo "Nom complet : $nomComplet";