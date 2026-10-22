<?php

namespace EliteLeagueClient\Client;

use Symfony\Component\HttpFoundation\Response;
use EliteLeagueClient\Interfaces\ConnectionInterface;

class Client extends AbstractClient implements ConnectionInterface
{
    public function makeRequest(string $method, string $path, ?array $data, ?array $headers): Response
    {
        throw new \Exception('Not implemented');
    }
}
