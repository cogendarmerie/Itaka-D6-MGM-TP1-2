<?php

namespace Messagerie\Collection;

use Messagerie\Interface\NotifiableInterface;

class NotificationCollection
{
    private array $notifications = [];

    public function add(NotifiableInterface $notification): void
    {
        $this->notifications[] = $notification;
    }

    public function getAll(): array
    {
        return $this->notifications;
    }

    public function send(): void
    {
        /** @var NotifiableInterface $notification */
        foreach ($this->notifications as $notification) {
            $notification->sendMessage("Coucou");
        }
    }
}