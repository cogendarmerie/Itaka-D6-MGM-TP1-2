<?php

namespace AgenceWeb\Domain;

class Skill
{
    public function __construct(
        private string $label
    )
    {
    }

    public function getLabel(): string
    {
        return $this->label;
    }
}