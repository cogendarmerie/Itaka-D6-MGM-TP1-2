<?php

namespace AgenceWeb\Domain\Tache;

use AgenceWeb\Domain\AbstractTache;
use AgenceWeb\Domain\Developer;
use AgenceWeb\Enum\ToolsEnum;
use AgenceWeb\Interfacce\BillableInterface;

class DesignTask extends AbstractTache implements BillableInterface
{
    public function __construct(
        string $titre,
        Developer $developer,
        private ToolsEnum $tool,
        bool $terminee = false
    )
    {
        parent::__construct($titre, $developer, $terminee);
    }

    public function getTool(): ToolsEnum
    {
        return $this->tool;
    }

    public function calculateCost(): float
    {
        return $this->getDeveloper()->getTjm();
    }
}