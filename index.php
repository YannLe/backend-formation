<?php
declare(strict_types=1); // Activer le mode strict pour le typage

// Fonction pour changer l'allégeance d'un personnage par référence
function changerAllegeance(string &$allegeance, string $nouvelleAllegeance): void {
    $allegeance = $nouvelleAllegeance; // Modifie directement la variable extérieure
}

// Allégeance initiale de Pippin
$allegeancePippin = 'La Comté';

echo "Avant: Pippin allège à $allegeancePippin.<br>";

// Changement d'allégeance pour Pippin
changerAllegeance($allegeancePippin, 'Gondor');

echo "Après: Pippin allège à $allegeancePippin.<br>";
?>
