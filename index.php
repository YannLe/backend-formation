<?php
// Fonction pour déterminer le rôle d'un personnage
function determinerRolePersonnage($nom) {
    return match ($nom) {
        'Frodon' => 'Porteur de l\'Anneau',
        'Aragorn' => 'Héritier d\'Isildur et futur roi du Gondor',
        'Gandalf' => 'Magicien et guide de la Communauté de l\'Anneau',
        'Legolas' => 'Archer elfe et membre de la Communauté de l\'Anneau',
        'Gimli' => 'Guerrier nain et membre de la Communauté de l\'Anneau',
        default => 'Personnage inconnu',
    };
}

// Exemples d'utilisation de la fonction
$personnages = ['Frodon', 'Aragorn', 'Gandalf', 'Legolas', 'Gimli', 'Sam'];

foreach ($personnages as $personnage) {
    echo $personnage . ' est ' . determinerRolePersonnage($personnage) . ".<br>";
}
