<?php

$personnage     = 'Frodo';
$anneeNaissance = 2968;
$taille         = 107.9;
$estUnHobbit    = true;

echo "Nom du personnage : $personnage <br>";
echo "Annee de naissance : $anneeNaissance <br>";
echo "Taille : $taille <br>";
echo 'Est-ce un hobbit ? ';

echo $estUnHobbit ? 'Oui' : 'Non';

$taille = 102.5;

echo "<br>";
echo "Nouvelle taille : $taille cm";

$nomComplet = $personnage . ' Sacquet';
echo "<br>";
echo "Nom complet: $nomComplet";