<?php
namespace CompteBancaire\Domain;
class CompteBancaire
{
    public function __construct(
        private float $solde,
        private string $titulaire
    )
    {
    }

    public function getSolde(): float
    {
        return $this->solde;
    }

    public function getTitulaire(): string
    {
        return $this->titulaire;
    }

    public function retrait(float $montant): void
    {
        if ($montant < 0 || $montant > $this->solde) return;
        $this->solde -= $montant;
    }

    public function depot(float $depot): void
    {
        if ($depot < 0) return;
        $this->solde += $depot;
    }

    public function calculerInteret(): float
    {
        return $this->solde * 1.024 - $this->solde;
    }

    public function afficherSolde(): void
    {
        echo $this->solde . PHP_EOL;
    }
}