<?php
namespace BikeShop\Domain;
abstract class AbstractVelo
{
    public function __construct(
        protected string $marque,
        protected int $prix,
        protected string $couleur
    )
    {
    }

    public function getMarque(): string
    {
        return $this->marque;
    }

    public function getPrix(): int
    {
        return $this->prix;
    }

    public function getCouleur(): string
    {
        return $this->couleur;
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
        echo $message;
    }

    public function afficherConfiguration(): void
    {
        $this->displayConfigurationFromChildren(get_object_vars($this));
    }
}