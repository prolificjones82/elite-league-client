<?php

namespace EliteLeagueClient\Client;

use EliteLeagueClient\Constants;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractClient
{
    private string $baseUrl;
    private array $headers = [];

    public function __construct(?array $headers)
    {
        $this->setBaseUrl(Constants::BASE_URL);
        $this->setHeaders(array_merge([
            'Cache-Control' => 'no-cache',
            'Content-Type' => Constants::CONTENT_TYPE,
        ], $headers ?? []));
    }

    abstract public function makeRequest(string $method, string $path, ?array $data, ?array $headers): Response;

    /**
     * Get the value of baseUrl
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * Set the value of baseUrl
     *
     * @return self
     */
    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * Get the value of headers
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Set the value of headers
     *
     * @return self
     */
    public function setHeaders(array $headers = [])
    {
        $this->headers = array_merge($this->headers, $headers);

        return $this;
    }
}
