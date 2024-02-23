<?php


function changerAllegeances(string &$allegeance, string $nouvelleAllegeance): void
{
    $allegeance = $nouvelleAllegeance;
}


$allegeancePipin = 'La Comté';

echo "Pipin allège à $allegeancePipin";
echo '<br>';

changerAllegeances($allegeancePipin, 'Gondor');

echo "Après, Pipin allège à $allegeancePipin";
