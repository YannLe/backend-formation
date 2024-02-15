<?php
class Archer extends Personnage implements CombattantInterface
{
    private int $nbFlèches = 20;

    public function __construct(string $nom, string $race, ?int $nbFlèches)
    {
        parent::__construct($nom, $race);
        if ($nbFlèches) {
            $this->nbFlèches = $nbFlèches;
        }
    }

    // Override de la méthode sePresenter
    public function sePresenter()
    {
        parent::sePresenter();
        echo "Et je tire avec mon arc. J'ai {$this->getNbFlèches()} flèches.<br>";
    }

    public function combattre()
    {
        $this->tirerAvecArc();
        echo "$this->nom tire avec son arc, il lui reste {$this->getNbFlèches()} flèches <br>";
    }

    private function tirerAvecArc()
    {
        $this->setNbFlèches($this->getNbFlèches() - 1);
    }

    public function getNbFlèches(): int
    {
        return $this->nbFlèches;
    }

    public function setNbFlèches(int $nbFlèches): void
    {
        $this->nbFlèches = $nbFlèches;
    }
}
