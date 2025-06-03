<?php

namespace Messagerie\Infra\Notifiable;

use Config\Domain\Notification;
use Messagerie\Interface\NotifiableInterface;

class NotificationPush implements NotifiableInterface
{
    public function __construct(private string $message)
    {
    }

    public function sendMessage(): void
    {
        Notification::showMessage("Envoie d'une notification push : " . $this->message);
    }
}