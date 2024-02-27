<?php

class NonCombattant extends Personnage
{

    public function sePresenter(): void
    {
        parent::sePresenter();
        echo 'Je ne combats pas ! <br>';
    }
}