<?php

namespace AgenceWeb\Collection;

use AgenceWeb\Domain\Skill;

class SkillCollection
{
    private array $skills = [];

    public function add(Skill $skill): void
    {
        $this->skills[] = $skill;
    }

    public function getAll(): array
    {
        return $this->skills;
    }

    public function count(): int
    {
        return count($this->skills);
    }
}