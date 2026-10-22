<?php

namespace EliteLeagueClient\Schedule\Response;

use EliteLeagueClient\Interfaces\ReadonlyInterface;

final readonly class ScoreTeamResponse implements ReadonlyInterface
{
    public function __construct(
        public int $score_home,
        public int $score_guest,
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
