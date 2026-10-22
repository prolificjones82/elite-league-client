<?php

namespace EliteLeagueClient\Interfaces;

interface ReadonlyInterface
{
    public function toArray(): array;

    public static function fromArray(array $data);
}
