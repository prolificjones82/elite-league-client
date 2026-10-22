<?php

namespace EliteLeagueClient\Schedule\Response;

use EliteLeagueClient\Interfaces\ReadonlyInterface;

final readonly class ResultResponse implements ReadonlyInterface
{
    public function __construct(
        public bool $extra_time,
        public bool $shooting,
        public bool $contumacy,
        public ScoreResponse $score,
    ) {}

    public function toArray(): array
    {
        //TODO: implement toArray
        throw new \Exception('toArray not implemented');
    }

    public function fromArray(array $data): self
    {
        //TODO: implement fromArray
        throw new \Exception('fromArray not implemented');
    }
}
