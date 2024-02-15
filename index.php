<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('CombattantInterface.php');
include('Personnage.php');
include('Guerrier.php');
include('Magicien.php');
include('Archer.php');
include('Reine.php');
include('Voyageur.php');


try {
    $frodo = new Guerrier(nom: 'Frodon', race: 'Hobbit', arme: 'Dard');
    $aragorn = new Guerrier('Aragorn', 'Humain', 'Anduril');
    $gandalf = new Magicien('Gandalf', 'Istar', 'Vous ne passerez pas');
    $legolas = new Archer('Legolas', 'Elfe', 30);
    $galadriel = new Reine('Galadriel', 'Elfe');
    $bilbo = new Voyageur('Bilbo', 'Hobbit');

    /** @var array<Personnage> $personnages */
    $personnages = [$frodo, $galadriel, $gandalf, $aragorn, $legolas, $bilbo];

    $frodo->ajouterUnSecret('Je suis le porteur de l\'anneau');

    foreach ($personnages as $personnage) {
        //$personnage->revelerSecret(); Lève une erreur
        $personnage->sePrésenterEnConfiance();
    echo "<br>";
}
} catch (Exception $e) {
    var_dump($e);
}




