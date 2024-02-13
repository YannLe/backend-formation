<?php
// Liste de personnages du Seigneur des Anneaux
$personnages = [
    ['nom' => 'Frodon', 'race' => 'Hobbit', 'allégeance' => 'La Comté'],
    ['nom' => 'Aragorn', 'race' => 'Humain', 'allégeance' => 'Gondor'],
    ['nom' => 'Legolas', 'race' => 'Elfe', 'allégeance' => 'Forêt Noire'],
    ['nom' => 'Gimli', 'race' => 'Nain', 'allégeance' => 'Moria'],
    ['nom' => 'Gandalf', 'race' => 'Istar', 'allégeance' => 'Les Peuples Libres de la Terre du Milieu']
];

// Instruction conditionnelle pour vérifier l'appartenance de Gandalf
$nomRecherche = 'Gandalf';
foreach ($personnages as $personnage) {
    if ($personnage['nom'] === $nomRecherche) {
        echo $nomRecherche . ' appartient à la race des ' . $personnage['race'] . ' et allège à ' . $personnage['allégeance'] . ".<br>";
        break; // Arrête la boucle une fois Gandalf trouvé
    }
}

// Boucle pour afficher l'allégeance de chaque personnage
echo "<br>Liste des allégeances:<br>";
foreach ($personnages as $personnage) {
    echo $personnage['nom'] . ' allège à ' . $personnage['allégeance'] . ".<br>";
}
