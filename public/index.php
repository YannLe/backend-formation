<?php

function changerLieu() {
    global $lieuEnCours;
    $lieuEnCours = 'Mordor';
}

$lieuEnCours = 'La Comté';

echo "Lieu : $lieuEnCours <br>";
changerLieu();
echo "Nouveau lieu : $lieuEnCours <br>";