<?php

namespace EliteLeagueClient\Game\Response;

use EliteLeagueClient\Interfaces\ReadonlyInterface;
use EliteLeagueClient\Game\Response\GameEvents\GoalEvent;
use EliteLeagueClient\Game\Response\GameEvents\PenaltyEvent;
use EliteLeagueClient\Game\Response\GameEvents\ShootoutEvent;
use EliteLeagueClient\Game\Response\GameEvents\GoalkeeperChangeEvent;

final readonly class GameEventResponse implements ReadonlyInterface
{
    public function __construct(
        /**
         * @var array<int, GoalkeeperChangeEvent|GoalEvent|PenaltyEvent>
         */
        public array $period_one,
        /**
         * @var array<int, GoalkeeperChangeEvent|GoalEvent|PenaltyEvent>
         */
        public array $period_two,
        /**
         * @var array<int, GoalkeeperChangeEvent|GoalEvent|PenaltyEvent>
         */
        public array $period_three,
        /**
         * @var array<int, GoalkeeperChangeEvent|GoalEvent|PenaltyEvent>
         */
        public array $overtime,
        /**
         * @var array<int, ShootoutEvent>
         */
        public array $shootout,
        public int $last_event_time,
    ) {}

    public function toArray(): array
    {
        // TODO: return events as array
        throw new \Exception('Not implemented');
    }

    public static function fromArray(array $data): self
    {
        return new self(
            period_one: array_map(
                match ($data['type']) {
                    'goalkeeperChange' => GoalkeeperChangeEvent::fromArray(...),
                    'goal' => GoalEvent::fromArray(...),
                    'penalty' => PenaltyEvent::fromArray(...),
                },
                $data['1'] ?? [],
            ),
            period_two: array_map(
                match ($data['type']) {
                    'goalkeeperChange' => GoalkeeperChangeEvent::fromArray(...),
                    'goal' => GoalEvent::fromArray(...),
                    'penalty' => PenaltyEvent::fromArray(...),
                },
                $data['2'] ?? [],
            ),
            period_three: array_map(
                match ($data['type']) {
                    'goalkeeperChange' => GoalkeeperChangeEvent::fromArray(...),
                    'goal' => GoalEvent::fromArray(...),
                    'penalty' => PenaltyEvent::fromArray(...),
                },
                $data['3'] ?? [],
            ),
            overtime: array_map(
                match ($data['type']) {
                    'goalkeeperChange' => GoalkeeperChangeEvent::fromArray(...),
                    'goal' => GoalEvent::fromArray(...),
                    'penalty' => PenaltyEvent::fromArray(...),
                },
                $data['overtime'] ?? [],
            ),
            shootout: array_map(
                ShootoutEvent::fromArray(...),
                $data['shootout'] ?? [],
            ),
            last_event_time: $data['last_event_time'],
        );
    }
}
