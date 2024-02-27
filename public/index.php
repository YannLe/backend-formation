<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('Personnage.php');
include('CombattantInterface.php');
include('NonCombattant.php');
include('Reine.php');
include('Voyageur.php');
include('Guerrier.php');
include('Magicien.php');
include('Archer.php');

function lancerCombat(CombattantInterface $combattant)
{
    $combattant->combattre();
    echo '<br>';
}

$frodo     = new Guerrier('Frodon', 'Hobbit', 'Dard');
$aragorn   = new Guerrier('Aragorn', 'Humain', 'Anduril');
$gandalf   = new Magicien('Gandalf', 'Istar', 'Vous ne passerez pas!');
$legolas   = new Archer('Legolas', 'Elfe', 30);
$galadriel = new Reine('Galadriel', 'Elfe');
$bilbo     = new Voyageur('Bilbo', 'Hobbit');



$frodo->ajouterUnSecret('Je suis le porteur de l\'anneau');

/** @var array<Personnage> $personnages */
$personnages = [$frodo, $aragorn, $gandalf, $legolas, $galadriel, $bilbo];

foreach ($personnages as $personnage) {
    $personnage->sePresenterEnConfiance();
    echo '<br>';
}

echo '<br><br>';

echo '<h2> Les orcs attaquent ! Sortez vos épées! </h2>';

foreach ($personnages as $combattant) {
    if ($combattant instanceof CombattantInterface) {
        lancerCombat($combattant);
    }
}
