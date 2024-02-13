<?php
$personnages = "Frodon, Sam, Merry, Pippin";

// Conversion de la chaîne en tableau
$personnagesArray = explode(", ", $personnages);

// Ajout de 'Gandalf' et 'Aragorn' au tableau en utilisant array_merge()
$ajouts = ["Gandalf", "Aragorn"];
$personnagesArray = array_merge($personnagesArray, $ajouts);

// Tri du tableau
sort($personnagesArray);

// Affichage des personnages triés
echo "Personnages pour l'expédition vers le Mordor: " . implode(", ", $personnagesArray) . ".<br>";
?>
a