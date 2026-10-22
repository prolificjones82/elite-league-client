<?php

namespace EliteLeagueClient\Game\Response\GameInfo;

use EliteLeagueClient\Interfaces\ReadonlyInterface;

final readonly class BilanceResponse implements ReadonlyInterface
{
    public function __construct(
        public int $homeWin,
        public int $visitorWin,
    ) {}

    public function toArray(): array
    {
        return [
            'homeWin' => $this->homeWin,
            'visitorWin' => $this->visitorWin,
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            homeWin: $data['homeWin'],
            visitorWin: $data['visitorWin'],
        );
    }
}
