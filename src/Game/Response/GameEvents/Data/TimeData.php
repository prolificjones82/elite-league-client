<?php

namespace EliteLeagueClient\Game\Response\GameEvents\Data;

use DateTime;
use EliteLeagueClient\Constants;
use EliteLeagueClient\Interfaces\ReadonlyInterface;

final readonly class TimeData implements ReadonlyInterface
{
    public function __construct(
        public DateTime $realTime,
        public int $scoreboardTime,
    ) {}

    public function toArray(): array
    {
        return [
            'realTime' => $this->realTime->format(Constants::DATETIME_FORMAT),
            'scoreboardTime' => $this->scoreboardTime,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            realTime: new DateTime($data['realTime']),
            scoreboardTime: $data['scoreboardTime'],
        );
    }
}
