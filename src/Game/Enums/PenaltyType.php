<?php

namespace EliteLeagueClient\Game\Enums;

/**
 * Defined here: https://gamestatseihl.docs.apiary.io/#reference/game-stats/game-events
 */
enum PenaltyType: string
{
    public const ABUSE = 'Abuse of officials';
    public const BITE = 'Biting';
    public const BOARD = 'Boarding';
    public const BROKEN = 'Playing with a broken stick';
    public const BE = 'Butt-ending';
    public const CHG = 'Charging';
    public const CFB = 'Checking from behind';
    public const HC = 'Checking to the head or neck';
    public const CLIP = 'Clipping';
    public const CLOSE_PUCK = 'Closing the hand on the puck';
    public const CC = 'Cross-checking';
    public const DANGEQ = 'Dangerous equipment';
    public const DOG = 'Delay of game';
    public const EMB = 'Diving / embellishment';
    public const ELB = 'Elbowing';
    public const FACEOFF = 'Face-off violations';
    public const FIGHT = 'Fighting';
    public const HEADBUTT = 'Head-butting';
    public const HS = 'High-sticking';
    public const HOLD = 'Holding';
    public const HOLDS = 'Holding the stick';
    public const HOOK = 'Hooking';
    public const ILLEQ = 'Illegal equipment';
    public const ILLEGAL_HIT = 'Illegal hit';
    public const INT = 'Interference';
    public const KNEE = 'Kneeing';
    public const KICK = 'Kicking';
    public const LEAVE_PB = 'Leaving the penalty box prematurely';
    public const NO_HELMET = 'Playing without a helmet';
    public const HAIR_PULL = 'Pulling hair, helmet, or cage';
    public const REFUSE_START = 'Refusing to start play';
    public const ROUGH = 'Roughing';
    public const SLASH = 'Slashing';
    public const SLEW = 'Slew-footing';
    public const SPEAR = 'Spearing';
    public const SPIT = 'Spitting';
    public const TAUNT = 'Taunting';
    public const OFFICIAL_ON_ICE = 'Team official entering the playing area';
    public const THROW = 'Throwing a stick or object';
    public const TMM = 'Too many men';
    public const TRIP = 'Tripping';
    public const UNS = 'Unsportsmanlike conduct';
    public const ILLEGAL_HIT_WOMEN = 'Illegal hit (women)';
}
