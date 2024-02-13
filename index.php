<?php
// Création d'un tableau multidimensionnel pour représenter les membres de l'expédition
$membresExpedition = [
    ['nom' => 'Frodon', 'propriétés' => ['Porteur de l\'Anneau', 'Hobbit']],
    ['nom' => 'Sam', 'propriétés' => ['Jardinier', 'Hobbit']],
    ['nom' => 'Aragorn', 'propriétés' => ['Protecteur', 'Guide', 'Humain']],
    ['nom' => 'Gandalf', 'propriétés' => ['Magicien', 'Conseiller']],
    ['nom' => 'Legolas', 'propriétés' => ['Archer', 'Elfe']],
    ['nom' => 'Gimli', 'propriétés' => ['Nain', 'Guerrier']],
];

// Accès et affichage des informations de chaque membre
$i = 0;
foreach ($membresExpedition as $membre) {
    echo "{$membre['nom']}:";
    foreach ($membre['propriétés'] as $propriété) {
        echo " $propriété,";
        ++$i;
    }
    echo '<br><br>';
}
echo "Nombre d'iteration : $i";