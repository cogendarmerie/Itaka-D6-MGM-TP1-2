<?php

namespace PVe\Domain\ProcesVerbal;

use PVe\Domain\AbstractProcesVerbal;
use Vehicule\Domain\AbstractVehicule;

class VitesseExcessive extends AbstractProcesVerbal
{
    public function __construct(private int $vitesse, private int $vitesseAutorise, AbstractVehicule $vehicule)
    {
        parent::__construct("Vitesse excessive", $this->categoriserInfraction(), $this->calculerDifferenceVitesse() * 4, $vehicule);
    }

    private function calculerDifferenceVitesse(): int
    {
        return $this->vitesse - $this->vitesseAutorise;
    }

    private function categoriserInfraction(): int
    {
        $diff = $this->calculerDifferenceVitesse();
        switch ($diff) {
            case ($diff < 10):
                return 1;
            case ($diff < 20):
                return 2;
            case ($diff < 30):
                return 3;
            default:
                return 4;
        }
    }
}