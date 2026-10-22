<?php

namespace EliteLeagueClient\Interfaces;

interface ReadonlyInterface
{
    public function toArray(): array;

    public function fromArray(array $data): self;
}
