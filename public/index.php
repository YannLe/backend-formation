<?php

$pileActions = [];

$pileActions[] = 'Quitter la Comté';
$pileActions[] = 'Atteindre Fondcombe';
$pileActions[] = 'Travers les monts brumeux';

echo "Ordre des actions (dernière à la première): <br>";

while(!empty($pileActions)) {
    echo array_pop($pileActions) . '<br>';
}