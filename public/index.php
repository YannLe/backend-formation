<?php

function role($nomPersonnage)
{
    return match ($nomPersonnage) {
        'Frodon' => 'Porteur de l\'anneau',
        'Aragorn' => 'Guide et futur roi du gondor',
        'Gandalf' => 'Magicien',
        'Gimli' => 'Guerrier nain',
        'Legolas' => 'Archer',
        default => 'Personnage inconnu'
    };
}

$personnages = ['Frodon', 'Sam', 'Aragorn', 'Gandalf', 'Legolas', 'Gimli'];

foreach ($personnages as $personnage) {
    echo "$personnage est " . role($personnage) . '<br>';
}