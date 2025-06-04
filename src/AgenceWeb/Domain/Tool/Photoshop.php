<?php

namespace AgenceWeb\Domain\Tool;

use AgenceWeb\Domain\AbstractTool;

class Photoshop extends AbstractTool
{
    public function __construct()
    {
        parent::__construct("Photoshop", 150);
    }
}