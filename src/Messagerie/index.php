<?php
namespace Messagerie;

use Messagerie\Collection\NotificationCollection;
use Messagerie\Domain\Message;
use Messagerie\Infra\Notifiable\NotificationEmail;
use Messagerie\Infra\Notifiable\NotificationPush;
use Messagerie\Infra\Notifiable\NotificationSMS;

require __DIR__ . '/../../vendor/autoload.php';

$notifications = new NotificationCollection();

$message = new Message("Information", "Bonjour tout le monde !");

$notifications->add(new NotificationSMS($message));
$notifications->add(new NotificationEmail($message));
$notifications->add(new NotificationPush($message));

$notifications->send();