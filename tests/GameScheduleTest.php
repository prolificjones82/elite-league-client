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
        $league = League::EIHL;
        $year = 2026;

        $response = $schedule->getLeagueSchedule($league, $year);
        $this->assertInstanceOf(ScheduleResponse::class, $response);
    }
}
