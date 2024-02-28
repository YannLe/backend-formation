<?php

namespace App\Helper;

class PersonnageHelper
{
    public function getNewPersonnage(): string
    {
        $personnages = [ 'Aragorn', 'Bilbo', 'Frodo', 'Legolas'];
        return $personnages[array_rand($personnages)];
    }
}