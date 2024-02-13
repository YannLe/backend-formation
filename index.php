<?php
$membresExpedition = [
    ['nom' => 'Frodon', 'role' => 'Porteur de l\'Anneau', 'age' => 50],
    ['nom' => 'Sam', 'role' => 'Jardinier et protecteur', 'age' => 38],
    ['nom' => 'Aragorn', 'role' => 'Protecteur et guide', 'age' => 87],
    ['nom' => 'Gandalf', 'role' => 'Magicien et conseiller', 'age' => 2019],
    ['nom' => 'Legolas', 'role' => 'Archer elfe', 'age' => 2931],
    ['nom' => 'Gimli', 'role' => 'Guerrier nain', 'age' => 139]
];

// Tri des membres par âge en utilisant usort et une fonction de rappel
usort($membresExpedition, static function($a, $b) {
    // Le « spaceship operator » permet de déterminer si une valeur est supérieure, inférieure ou identique
    // à une autre valeur. Cela s’exprime par 0 (égal à), -1 (plus petit que), ou 1 (plus grand que).
    return $a['age'] <=> $b['age'];
});

// Affichage des membres triés par âge
foreach ($membresExpedition as $membre) {
    echo "Nom: {$membre['nom']}, Âge: {$membre['age']}<br>";
}