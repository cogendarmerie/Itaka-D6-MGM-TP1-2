<?php

namespace AgenceWeb\Domain\Tool;

use AgenceWeb\Domain\AbstractTool;

class Figma extends AbstractTool
{
    public function __construct()
    {
        parent::__construct("Figma", 100);
    }
}