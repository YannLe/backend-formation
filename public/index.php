<?php

class SarumanException extends Exception
{

}


function traverserLaMontagne(string $chemin): void
{
    if ($chemin !== 'Moria') {
        throw new SarumanException("Le chemin $chemin n'est pas sur !");
    }
    echo "Le groupe traverse la montagne par $chemin en sécurité <br>";
}

try {
    traverserLaMontagne('Caradhras');
} catch (Exception $exception) {
    if ($exception instanceof SarumanException) {
        echo "Saruman nous barre le passage <br>";
    }
    try {
        traverserLaMontagne('Moria');
    } catch (Exception $exception) {
        echo 'Erreur' . $exception->getMessage() . '<br>';
    }
} finally {
    echo "Gandalf meurt ! ";
}