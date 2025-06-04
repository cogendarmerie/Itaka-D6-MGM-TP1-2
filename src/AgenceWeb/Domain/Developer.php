<?php

namespace AgenceWeb\Domain;

use AgenceWeb\Collection\SkillCollection;

class Developer
{
    public function __construct(
        private string $nom,
        private SkillCollection $skills,
        private int $tjm = 50
    )
    {
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getSkills(): SkillCollection
    {
        return $this->skills;
    }

    public function getTjm(): int
    {
        return $this->tjm;
    }
}