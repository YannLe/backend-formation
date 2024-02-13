<?php
// Pile d'actions pour l'expédition
$pileActions = [];

// Ajouter des actions à la pile
$pileActions[] = 'quitter La Comté';
$pileActions[] = 'traverser les Monts Brumeux';
$pileActions[] = 'atteindre Fondcombes';

echo "Ordre des actions (dernière à première):<br>";

// Traitement des actions dans l'ordre LIFO
while (!empty($pileActions)) {
    $action = array_pop($pileActions); // Retire et retourne le dernier élément de la pile
    echo "$action<br>";
}
