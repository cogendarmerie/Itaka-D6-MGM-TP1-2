<?php
namespace Messagerie;

use Messagerie\Collection\NotificationCollection;
use Messagerie\Infra\Notifiable\NotificationEmail;
use Messagerie\Infra\Notifiable\NotificationPush;
use Messagerie\Infra\Notifiable\NotificationSMS;

require __DIR__ . '/../../vendor/autoload.php';

$notifications = new NotificationCollection();

$notifications->add(new NotificationSMS("Coucou"));
$notifications->add(new NotificationEmail("Bonjour"));
$notifications->add(new NotificationPush("Welcome"));

$notifications->send();