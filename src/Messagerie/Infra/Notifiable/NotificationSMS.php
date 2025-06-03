<?php

namespace Messagerie\Infra\Notifiable;

use Config\Domain\Notification;
use Messagerie\Domain\Message;
use Messagerie\Interface\NotifiableInterface;

class NotificationSMS implements NotifiableInterface
{
    public function __construct(
        private Message $message,
    )
    {
    }

    public function sendMessage(): void
    {
        Notification::showMessage("Envoie d'un nouveau SMS : " . $this->message->getMessage());
    }
}