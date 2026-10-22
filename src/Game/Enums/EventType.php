<?php

namespace EliteLeagueClient\Game\Enums;

/**
 * Defined here: https://gamestatseihl.docs.apiary.io/#reference/game-stats/game-events
 */
enum EventType: string
{
    public const goal = 'Goal';
    public const penalty = 'Penalty';
    public const goalkeeperChange = 'Goalkeeper Change';
}
