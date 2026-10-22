<?php

namespace EliteLeagueClient\Schedule\Enums;

enum GameStatus: string
{
    case BEFORE_MATCH = 'Fixture';
    case LIVE = 'Live';
    case AFTER_MATCH = 'Result';
    case POSTPONED = 'Postponed';
    case INTERUPTED = 'Interupted';
    case CANCELLED = 'Cancelled';
}
