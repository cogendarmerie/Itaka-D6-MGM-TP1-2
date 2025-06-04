<?php
namespace Reservation;
use Config\Domain\Notification;
use Reservation\Collection\ReservationCollection;
use Reservation\Collection\RoomCollection;
use Reservation\Domain\Client;
use Reservation\Domain\Reservation;
use Reservation\Domain\Room;
use Reservation\Enum\ReservationStatusEnum;
use Reservation\Enum\RoomTypeEnum;
use Reservation\Exception\ReservationConflictException;

require __DIR__ . '/../../vendor/autoload.php';

/**
 * Définition des chambres disponibles dans l'hôtel.
 */
$studio = new Room(
    id: 1,
    number: '101',
    type: RoomTypeEnum::SIMPLE,
    pricePerNight: 100.0
);

$deluxe = new Room(
    id: 2,
    number: '102',
    type: RoomTypeEnum::SUITE,
    pricePerNight: 200.0
);

$double = new Room(
    id: 3,
    number: '103',
    type: RoomTypeEnum::DOUBLE,
    pricePerNight: 150.0
);

$presidentiel = new Room(
    id: 4,
    number: '104',
    type: RoomTypeEnum::SUITE,
    pricePerNight: 2200.0
);

$couple = new Room(
    id: 5,
    number: '105',
    type: RoomTypeEnum::DOUBLE,
    pricePerNight: 180.0
);

$chambres = new RoomCollection();
$chambres->add($studio);
$chambres->add($deluxe);
$chambres->add($double);
$chambres->add($presidentiel);
$chambres->add($couple);

/**
 * Création des clients
 */
$john = new Client(
    id: 1,
    name: 'John Doe',
    email: 'johndoe@example.com'
);

$matteo = new Client(
    id: 2,
    name: 'Matteo Rossi',
    email: 'matteo@example.com'
);

$timothee = new Client(
    id: 3,
    name: 'Timothée Chalamet',
    email: 'timothee@example.com'
);

/**
 * Création des réservations
 */
$reservations = new ReservationCollection();

try {
    $reservations->add(new Reservation(
        id: 1,
        room: $presidentiel,
        client: $timothee,
        startDate: new \DateTime("10-10-2025"),
        endDate: new \DateTime("20-10-2025"),
        status: ReservationStatusEnum::CONFIRMED
    ));

    $reservations->add(new Reservation(
        id: 2,
        room: $studio,
        client: $matteo,
        startDate: new \DateTime("10-10-2025"),
        endDate: new \DateTime("15-10-2025"),
        status: ReservationStatusEnum::CONFIRMED
    ));

    // Tentative de réservation qui devrait échouer en raison d'un conflit de dates
    $reservations->add(new Reservation(
        id: 3,
        room: $presidentiel,
        client: $john,
        startDate: new \DateTime("15-10-2025"),
        endDate: new \DateTime("25-10-2025"),
        status: ReservationStatusEnum::CONFIRMED
    ));
} catch (ReservationConflictException $exception) {
    Notification::showErrorMessage($exception->getMessage());
} finally {
    Notification::showMessage(sprintf('%s réservations', $reservations->count()));
}

/**
 * Affichage de l'historique client
 */

Notification::showTitle("Historique des réservations de Timothée Chalamet");

/** @var Reservation $reservation */
foreach ($reservations->getAllByClient($timothee) as $reservation) {
    Notification::showMessage(sprintf(
        'Réservation de %s pour la chambre %s du %s au %s',
        $reservation->getClient()->getName(),
        $reservation->getRoom()->getNumber(),
        $reservation->getStartDate()->format('d-m-Y'),
        $reservation->getEndDate()->format('d-m-Y')
    ));
}

/**
 * Calculer le chiffre d'affaires du mois d'octobre 2025
 */

Notification::showTitle("Chiffre d'affaires du mois d'octobre 2025");
Notification::showMessage(sprintf("Chiffre d'affaires : %.2f €", $reservations->calculateTotalAmount(new \DateTime("01-10-2025"))));

/**
 * Afficher les chambres disponibles pour une période donnée
 */

Notification::showTitle("Chambres disponibles du 10 au 15 octobre 2025");

foreach ($chambres->getAvailableRooms(new \DateTime("10-10-2025"), new \DateTime("15-10-2025"), $reservations) as $room) {
    Notification::showMessage(sprintf(
        'Chambre %s (%s) - %.2f € par nuit',
        $room->getNumber(),
        $room->getType()->name,
        $room->getPricePerNight()
    ));
}