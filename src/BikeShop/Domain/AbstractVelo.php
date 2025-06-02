<?php
namespace BikeShop\Domain;
use BikeShop\Collection\AccessoiresCollection;
use BikeShop\Interface\ProduitInterface;

abstract class AbstractVelo implements ProduitInterface
{
    private AccessoiresCollection $accessoires;

    public function __construct(
        protected string $marque,
        protected float $prix,
        protected string $couleur
    )
    {
        $this->accessoires = new AccessoiresCollection();
    }

    public function getMarque(): string
    {
        return $this->marque;
    }

    /**
     * Calculer le prix du vélo avec accessoires inclus
     * @return float
     */
    public function getPrix(): float
    {
        return $this->prix + array_sum(
            array_map(
                function (AbstractAccessoire $accessoire) {
                    return $accessoire->getPrix();
                },
                $this->accessoires->getAll()
            )
        );
    }

    public function getCouleur(): string
    {
        return $this->couleur;
    }

    public function getAccessoires(): AccessoiresCollection
    {
        return $this->accessoires;
    }

    /**
     * Afficher la configuration de l'objet
     * @param mixed $props
     * @return void
     */
    protected function displayConfigurationFromChildren(mixed $props): void
    {
        //$props = get_object_vars($this);
        $message = "___________" . PHP_EOL;
        foreach ($props as $key => $value) {
            $message .= $key . ": " . $value . "\n";
        }

        // Affichage des accessoire
        if ($this->accessoires->count() > 0) {
            $message .= "-- Accessoires --" . PHP_EOL;

            /** @var AbstractAccessoire $accessoire */
            foreach ($this->accessoires->getAll() as $accessoire) {
                $message .= $accessoire->getNom() . " - " . $accessoire->getPrix() . " €" . PHP_EOL;
            }
        }

        echo $message;
    }

    public function afficherConfiguration(): void
    {
        $this->displayConfigurationFromChildren(get_object_vars($this));
    }
}