<?php

namespace EliteLeagueClient\Schedule\Enums;

/**
 * Defined here: https://gamestatseihl.docs.apiary.io/#reference/game-schedule/get-league-schedule
 */
enum GameStatus: string
{
    case BEFORE_MATCH = 'Fixture';
    case LIVE = 'Live';
    case AFTER_MATCH = 'Result';
    case POSTPONED = 'Postponed';
    case INTERUPTED = 'Interupted';
    case CANCELLED = 'Cancelled';
}
