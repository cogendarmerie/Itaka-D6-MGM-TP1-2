<?php

namespace Messagerie\Infra\Notifiable;

use Config\Domain\Notification;
use Messagerie\Interface\NotifiableInterface;

class NotificationSMS implements NotifiableInterface
{
    public function __construct(
        private string $message,
    )
    {
    }

    public function sendMessage(): void
    {
        Notification::showMessage("Envoie d'un nouveau SMS : " . $this->message);
    }
}