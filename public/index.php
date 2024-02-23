<?php


$personnages      = 'Frodo, Sam, Merry, Pippin';
$personnagesArray = array_map('trim', explode(',', $personnages));

$ajouts = ['Gandalf', 'Aragorn'];

$personnagesArray = array_merge($personnagesArray, $ajouts);

sort($personnagesArray);

echo "Personnages prêts pour l'expédition : " . implode(', ', $personnagesArray) . '<br>';