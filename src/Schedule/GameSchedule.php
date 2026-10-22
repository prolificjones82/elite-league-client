<?php

namespace EliteLeagueClient\Schedule;

use Exception;
use EliteLeagueClient\Client\Client;
use GuzzleHttp\Exception\RequestException;
use EliteLeagueClient\Schedule\Enums\League;
use EliteLeagueClient\Schedule\Response\ScheduleResponse;

final class GameSchedule extends Client
{
    /**
     * Get League Schedule
     *
     * @param League  $league
     * @param ?string $year
     *
     * @return ScheduleResponse
     * @throws Exception
     */
    public function getLeagueSchedule(League $league, ?string $year): ScheduleResponse
    {
        $path = sprintf('/league-matches/%s/%s.json', $year ?? date('Y'), $league->value);

        try {
            $req = $this->makeRequest('GET', $path);
            $res = $this->getResponseData($req);
            $response = ScheduleResponse::fromArray($res['matches']);
            return $response;
        } catch (RequestException $re) {
            $this->getLogger()->addError(sprintf('(%s) - %s', $re->getCode(), $re->getMessage()), [
                'method' => $re->getRequest()->getMethod(),
                'headers' => $re->getRequest()->getHeaders(),
                'uri' => $re->getRequest()->getUri(),
            ]);

            throw new Exception($re->getMessage(), $re->getCode(), $re->getPrevious());
        } catch (Exception $e) {
            $this->getLogger()->addError(sprintf('(%s) - %s', $e->getCode(), $e->getMessage()));

            throw $e;
        }
    }

    /**
     * Get Team Schedule
     *
     * @param League     $league
     * @param string|int $team
     * @param ?string    $year
     *
     * @return ScheduleResponse
     * @throws Exception
     */
    public function getTeamSchedule(League $league, int|string $team, ?string $year): ScheduleResponse
    {
        $path = sprintf('/league-team-matches/%s/%s/%s.json', $year ?? date('Y'), $league->value, (string) $team);

        try {
            $req = $this->makeRequest('GET', $path);
            $res = $this->getResponseData($req);
            $response = ScheduleResponse::fromArray($res['matches']);
            return $response;
        } catch (RequestException $re) {
            $this->getLogger()->addError(sprintf('(%s) - %s', $re->getCode(), $re->getMessage()), [
                'method' => $re->getRequest()->getMethod(),
                'headers' => $re->getRequest()->getHeaders(),
                'uri' => $re->getRequest()->getUri(),
            ]);

            throw new Exception($re->getMessage(), $re->getCode(), $re->getPrevious());
        } catch (Exception $e) {
            $this->getLogger()->addError(sprintf('(%s) - %s', $e->getCode(), $e->getMessage()));

            throw $e;
        }
    }
}
