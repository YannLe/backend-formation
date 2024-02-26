<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('Personnage.php');
include ('Combattant.php');
include('Guerrier.php');
include('Magicien.php');
include('Archer.php');


$frodo     = new Guerrier('Frodon', 'Hobbit', 'Dard');
$aragorn   = new Guerrier('Aragorn', 'Humain', 'Anduril');
$gandalf   = new Magicien('Gandalf', 'Istar', 'Vous ne passerez pas!');
$legolas   = new Archer('Legolas', 'Elfe', 30);
$galadriel = new Personnage('Galadriel', 'Elfe');

/** @var array<Personnage> $tableauDePersonnage */
$tableauDePersonnage = [$frodo, $aragorn, $gandalf, $legolas, $galadriel];

foreach ($tableauDePersonnage as $personnage) {
    $personnage->sePresenter();
    if (method_exists($personnage, 'combattre')) {
        $personnage->combattre();
    }
}

