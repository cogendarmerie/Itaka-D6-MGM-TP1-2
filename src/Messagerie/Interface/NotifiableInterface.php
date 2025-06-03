<?php

namespace Messagerie\Interface;

use Messagerie\Domain\Message;

interface NotifiableInterface
{
    public function __construct(Message $message);

    public function sendMessage(): void;
}