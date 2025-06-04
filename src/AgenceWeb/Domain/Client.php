<?php

namespace AgenceWeb\Domain;

class Client
{
    public function __construct(
        private string $nom
    )
    {
    }

    public function getNom(): string
    {
        return $this->nom;
    }
}