<?php

namespace Messagerie\Interface;

interface NotifiableInterface
{
    public function __construct(string $message);

    public function sendMessage(): void;
}