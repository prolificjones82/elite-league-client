<?php

namespace EliteLeagueClient\Game\Response\GameEvents;

use EliteLeagueClient\Game\Enums\EventType;
use EliteLeagueClient\Game\Response\GameEvents\Data\GoalData;
use EliteLeagueClient\Game\Response\GameEvents\Data\PenaltyData;
use EliteLeagueClient\Game\Response\GameEvents\Data\ShootoutData;
use EliteLeagueClient\Game\Response\GameEvents\Data\GoalkeeperChangeData;

abstract readonly class BaseEvent
{
    public function __construct(
        public int $time,
        public EventType $type,
        public GoalkeeperChangeData|GoalData|PenaltyData|ShootoutData $data,
    ) {}
}
