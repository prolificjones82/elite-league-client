<?php

namespace EliteLeagueClient\Game\Response\Data;

use EliteLeagueClient\Game\Response\GameInfo\RosterPlayerResponse;
use EliteLeagueClient\Interfaces\ReadonlyInterface;

final readonly class GoalAttendantData implements ReadonlyInterface
{
    public function __construct(
        /**
         * @var Array<int, RosterPlayerResponse>
         */
        public array $positive,
        /**
         * @var Array<int, RosterPlayerResponse>
         */
        public array $negative,
    ) {}

    public function toArray(): array
    {
        return [
            'positive' => array_map(
                static fn(RosterPlayerResponse $player) => $player->toArray(),
                $this->positive
            ),
            'negative' => array_map(
                static fn(RosterPlayerResponse $player) => $player->toArray(),
                $this->negative
            )
        ];
    }

    public static function fromArray(array $data)
    {
        return new self(
            positive: array_map(
                RosterPlayerResponse::fromArray(...),
                $data['positive'] ?? []
            ),
            negative: array_map(
                RosterPlayerResponse::fromArray(...),
                $data['negative'] ?? []
            ),
        );
    }
}
