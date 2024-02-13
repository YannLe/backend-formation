<?php
function traverserLaMontagne($chemin) {
    if ($chemin !== 'Moria') {
        throw new Exception("Le chemin $chemin n'est pas sûr !");
    }
    echo "Le groupe traverse la montagne par $chemin en sécurité.<br>";
}

try {
    traverserLaMontagne('Caradhras');
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
    // Tentative de traverser par un autre chemin
    try {
        traverserLaMontagne('Moria');
    } catch (Exception $e) {
        // Gestion de l'exception si Moria est également dangereux
        echo "Erreur : " . $e->getMessage() . "<br>";
    }
}
