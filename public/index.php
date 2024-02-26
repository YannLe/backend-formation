<?php


$membresExpedition = [
    ['nom' => 'Frodo', 'propriété' => ['Porteur de l\'anneau', 'Hobbit']],
    ['nom' => 'Sam', 'propriété' => ['Jardinier', 'Hobbit']],
    ['nom' => 'Aragorn', 'propriété' => ['Protecteur', 'Humain']],
    ['nom' => 'Gandalf', 'propriété' => ['Magicien', 'Conseiller']],
    ['nom' => 'Legolas', 'propriété' => ['Archer', 'Elfe']],
    ['nom' => 'Gimli', 'propriété' => ['Nain', 'Guerrier']],
];


$i = 0;
foreach ($membresExpedition as $membre) {
    echo "{$membre['nom']} : ";
    foreach ($membre['propriété'] as $propriete) {
        echo "$propriete, ";
        ++$i;
    }
    echo '<br>';
}

echo "Nombre d'itération : $i";