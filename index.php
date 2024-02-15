<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('Personnage.php');
include('Guerrier.php');
include('Magicien.php');
include('Archer.php');


$frodo = new Guerrier('Frodon', 'Hobbit', 'Dard');
$aragorn = new Guerrier('Aragorn', 'Humain', 'Anduril');
$gandalf = new Magicien('Gandalf', 'Istar', 'Vous ne passerez pas');
$legolas = new Archer('Legolas', 'Elfe', 30);
$galadriel = new Personnage('Galadriel', 'Elfe');
$bilbo = new Personnage('Bilbo', 'Hobbit');

/** @var array<Personnage> $personnages */
$personnages = [$frodo, $galadriel, $gandalf, $aragorn, $legolas, $bilbo];
foreach ($personnages as $personnage) {
    $personnage->sePresenter();
    echo "<br>";
}
