<?php

namespace EliteLeagueClient;

use Monolog\Logger as Monolog;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

final class Logger extends Monolog
{
    private Monolog $logger;
    private string $logPath;

    public function __construct(string $channel = 'elite_league')
    {
        $this->logger = new Monolog($channel);
        $this->logPath = __DIR__ . DIRECTORY_SEPARATOR . $channel . '.log';
        $this->logger->pushHandler(new StreamHandler($this->logPath));
        $this->logger->pushHandler(new FirePHPHandler());

        return $this;
    }

    public function addInfo(string $message, array $context = [])
    {
        $this->logger->info($message, $context);
    }
}
