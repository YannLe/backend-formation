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

function lancerCombat(CombattantInterface $combattant)
{
    $combattant->combattre();
}

$frodo = new Guerrier('Frodon', 'Hobbit', 'Dard');
$aragorn = new Guerrier('Aragorn', 'Humain', 'Anduril');
$gandalf = new Magicien('Gandalf', 'Istar', 'Vous ne passerez pas');
$legolas = new Archer('Legolas', 'Elfe', 30);
$galadriel = new Reine('Galadriel', 'Elfe');
$bilbo = new Voyageur('Bilbo', 'Hobbit');

/** @var array<Personnage> $personnages */
$personnages = [$frodo, $galadriel, $gandalf, $aragorn, $legolas, $bilbo];
foreach ($personnages as $personnage) {
    $personnage->sePresenter();
    echo "<br>";
}

echo "<h2> Les orcs attaquent! Sortez vos épées! </h2>";

foreach ($personnages as $combattant) {
    if ($combattant instanceof CombattantInterface) {
        lancerCombat($combattant);
        echo "<br>";
    }
}
