<?php

namespace EliteLeagueClient\Client;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use EliteLeagueClient\Interfaces\ConnectionInterface;

abstract class Client extends AbstractClient implements ConnectionInterface
{
    public function __construct(string $className, ?array $headers)
    {
        parent::__construct($headers);
        $this->getLogger()->addInfo(sprintf('Elite League Client - %s', $className));
    }

    public function makeRequest(string $method, string $path, ?array $data = [], ?array $headers = []): Response
    {
        $url = sprintf('%s/%s', $this->getBaseUrl(), ltrim($path, '/'));
        $this->getLogger()->addInfo(sprintf('API Call to: %s', $url));

        $response = $this->getClient()->request($method, $path, $this->getClientOptions());
        return new JsonResponse(json_decode($response->getBody()), $response->getStatusCode(), $response->getHeaders());
    }
}
