<?php

namespace EliteLeagueClient\Schedule\Response;

use EliteLeagueClient\Interfaces\ReadonlyInterface;

final readonly class ScoreResponse implements ReadonlyInterface
{
    public function __construct(
        public ScoreTeamResponse $final,
        public ScoreTeamResponse $first_period,
        public ScoreTeamResponse $second_period,
        public ScoreTeamResponse $third_period,
        public ?ScoreTeamResponse $overtime,
        public ?ScoreTeamResponse $shootout,
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
