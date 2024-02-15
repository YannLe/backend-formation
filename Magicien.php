<?php
class Magicien extends Personnage
{
    private string $sort;

    public function __construct(string $nom, string $race, string $sort)
    {
        parent::__construct($nom, $race);
        $this->sort = $sort;
    }

    // Override de la méthode sePresenter
    public function sePresenter()
    {
        parent::sePresenter();
        echo "Et je lance $this->sort.<br>";
    }

    public function combattre()
    {
        echo "$this->nom lance un sort de $this->sort<br>";
    }
}