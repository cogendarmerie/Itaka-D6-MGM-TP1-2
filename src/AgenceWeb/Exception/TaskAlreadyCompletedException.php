<?php

namespace AgenceWeb\Exception;

use AgenceWeb\Domain\AbstractTache;

class TaskAlreadyCompletedException extends \RuntimeException
{
    public function __construct(AbstractTache $tache, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct(sprintf("La tâche '%s' est déjà marquer comme terminer", $tache->getTitre()), $code, $previous);
    }
}