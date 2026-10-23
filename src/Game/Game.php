<?php

namespace EliteLeagueClient\Game;

use Exception;
use EliteLeagueClient\Client\Client;
use GuzzleHttp\Exception\RequestException;
use EliteLeagueClient\Game\Response\GameInfoResponse;
use EliteLeagueClient\Game\Response\TeamStatResponse;
use EliteLeagueClient\Game\Response\GameEventResponse;
use EliteLeagueClient\Game\Response\GoalieStatResponse;
use EliteLeagueClient\Game\Response\PlayerStatResponse;

final class Game extends Client
{
    public function getGameAndRoster(int|string $game_id): GameInfoResponse
    {
        $path = sprintf('/matches/%s/game-info.json', (string) $game_id);

        try {
            $req = $this->makeRequest('GET', $path);
            $res = $this->getResponseData($req);
            $response = GameInfoResponse::fromArray($res);
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

    public function getGameEvents(int|string $game_id): GameEventResponse
    {
        $path = sprintf('/matches/%s/period-events.json', (string) $game_id);

        try {
            $req = $this->makeRequest('GET', $path);
            $res = $this->getResponseData($req);
            $response = GameEventResponse::fromArray($res);
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

    public function getPlayerStats(int|string $game_id, int|string $team_id): PlayerStatResponse
    {
        $path = sprintf('/matches/%s/team-stats/%s.json', (string) $game_id, (string) $team_id);

        try {
            $req = $this->makeRequest('GET', $path);
            $res = $this->getResponseData($req);
            $response = PlayerStatResponse::fromArray($res);
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

    public function getGoalieStats(int|string $game_id): GoalieStatResponse
    {
        $path = sprintf('/matches/%s/top-goalies.json', (string) $game_id);

        try {
            $req = $this->makeRequest('GET', $path);
            $res = $this->getResponseData($req);
            $response = GoalieStatResponse::fromArray($res);
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

    // public function getTeamStats(int|string $game_id, int|string $team_id): TeamStatResponse
    // {
    //     $path = sprintf('/match-detail/team-stats/%s/%s.json', (string) $game_id, (string) $team_id);

    //     try {
    //         $req = $this->makeRequest('GET', $path);
    //         $res = $this->getResponseData($req);
    //         $response = TeamStatResponse::fromArray($res);
    //         return $response;
    //     } catch (RequestException $re) {
    //         $this->getLogger()->addError(sprintf('(%s) - %s', $re->getCode(), $re->getMessage()), [
    //             'method' => $re->getRequest()->getMethod(),
    //             'headers' => $re->getRequest()->getHeaders(),
    //             'uri' => $re->getRequest()->getUri(),
    //         ]);

    //         throw new Exception($re->getMessage(), $re->getCode(), $re->getPrevious());
    //     } catch (Exception $e) {
    //         $this->getLogger()->addError(sprintf('(%s) - %s', $e->getCode(), $e->getMessage()));

    //         throw $e;
    //     }
    // }
}
