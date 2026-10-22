<?php

namespace EliteLeagueClient\Schedule\Enums;

/**
 * Defined here: https://gamestatseihl.docs.apiary.io/#
 */
enum League: string
{
    case EIHL = '3';
    case CHALLENGE_CUP = '4';
    case PLAYOFFS = '5';
}
