<?php

namespace EliteLeagueClient\Standings;

use Exception;
use EliteLeagueClient\Client\Client;
use EliteLeagueClient\Schedule\Enums\League;

final class Standings extends Client
{
    public function getStandings(League $league, ?string $year)
    {
        $path = sprintf('/table/%s/%s.json', $year ?? date('Y'), $league->value);

        try {
            $req = $this->makeRequest('GET', $path);
            $res = $this->getResponseData($req);
            $response = StandingsResponse::fromArray($res);
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
