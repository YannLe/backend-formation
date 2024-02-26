<?php

class NonCombattant extends Personnage
{
    public function sePresenter(): void
    {
        echo "Je suis $this->nom. <br>";
    }
}