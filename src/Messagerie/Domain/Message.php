<?php

namespace Messagerie\Domain;

class Message
{
    public function __construct(
        private string $objet,
        private string $message
    )
    {
    }

    public function getObjet(): string
    {
        return $this->objet;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}