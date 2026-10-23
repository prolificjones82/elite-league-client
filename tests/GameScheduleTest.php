<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use EliteLeagueClient\Schedule\Enums\League;
use EliteLeagueClient\Schedule\GameSchedule;
use EliteLeagueClient\Schedule\Response\ScheduleResponse;

final class GameScheduleTest extends TestCase
{
    public function testGetLeagueSchedule(): void
    {
        $schedule = new GameSchedule();
        $leagues = [
            League::EIHL,
            League::CHALLENGE_CUP,
            League::PLAYOFFS,
        ];

        foreach ($leagues as $league) {
            $response = $schedule->getLeagueSchedule($league, 2025);
            $this->assertInstanceOf(ScheduleResponse::class, $response);
            $this->assertIsArray($response->matches, '$response->matches is not an array');
        }
    }

    public function testGetTeamSchedule(): void
    {
        $schedule = new GameSchedule();
        $leagues = [
            League::EIHL,
            League::CHALLENGE_CUP,
            League::PLAYOFFS,
        ];
        $team = $_ENV['ELITE_LEAGUE_DEFAULT_TEAM_ID'] ?? 96;

        foreach ($leagues as $league) {
            $response = $schedule->getTeamSchedule($league, $team, 2025);
            $this->assertInstanceOf(ScheduleResponse::class, $response);
            $this->assertIsArray($response->matches, '$response->matches is not an array');
        }
    }
}
