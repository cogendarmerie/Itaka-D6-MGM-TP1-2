<?php

namespace AgenceWeb;
use AgenceWeb\Collection\SkillCollection;
use AgenceWeb\Collection\TacheCollection;
use AgenceWeb\Domain\Client;
use AgenceWeb\Domain\Developer;
use AgenceWeb\Domain\Projet;
use AgenceWeb\Domain\Skill;
use AgenceWeb\Domain\Tache\DesignTask;
use AgenceWeb\Domain\Tache\DevelopmentTask;
use AgenceWeb\Domain\Tool\Figma;
use AgenceWeb\Enum\ToolsEnum;
use AgenceWeb\Exception\TaskAlreadyCompletedException;
use Config\Domain\Notification;

require __DIR__ . "/../../vendor/autoload.php";

try {
    $skills = new SkillCollection();
    $skills->add(new Skill("PHP"));

    $developer = new Developer(
        nom: "John",
        skills: $skills,
        tjm: 350
    );

    $designer = new Developer(
        nom: "Jane",
        skills: $skills,
        tjm: 300
    );

    $client = new Client(
        nom: "Super client"
    );

    $taches = new TacheCollection();
    $taches->add(new DesignTask(
        titre: "Maquette du site web",
        developer: $designer,
        tool: new Figma()
    ));
    $taches->add(new DevelopmentTask(
        titre: "Intrégration",
        developer: $developer,
        estimatedHours: 20
    ));

    $siteweb = new Projet(
        nom: "Site web",
        client: $client,
        taches: $taches,
        dateDebut: new \DateTime()
    );

    $taches->get(0)->completee();

    Notification::showTitle(sprintf('Projet "%s"', $siteweb->getNom()));
    Notification::showMessage(sprintf('Avancement du projet "%s" : %d%%',
        $siteweb->getNom(),
        $siteweb->getAvancement()
    ));
    Notification::showMessage(sprintf('Coût total du projet "%s" : %.2f€',
        $siteweb->getNom(),
        $siteweb->calculerCout()
    ));

    $taches->get(0)->completee();
} catch (TaskAlreadyCompletedException $exception) {
    Notification::showErrorMessage($exception->getMessage());
}