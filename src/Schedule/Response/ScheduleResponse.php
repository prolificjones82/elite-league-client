<?php

namespace EliteLeagueClient\Schedule\Response;

use DateTime;
use EliteLeagueClient\Schedule\Enums\League;
use EliteLeagueClient\Schedule\Enums\GameStatus;
use EliteLeagueClient\Interfaces\ReadonlyInterface;

final readonly class ScheduleResponse implements ReadonlyInterface
{
    public function __construct(
        public int $id,
        public DateTime $start_date,
        public League $league_id,
        public string $league,
        public int $season,
        public string $round,
        public string $group,
        public TeamResponse $home,
        public TeamResponse $guest,
        public GameStatus $status,
        public ?int $overtimeCount,
        public ResultResponse $results,
        public string $actual_time_name,
        public string $actual_time_alias,
        public int $last_event_time,
        public string $arena,
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
