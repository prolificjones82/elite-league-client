<?php

namespace EliteLeagueClient;

use DateTimeZone;
use Psr\Clock\ClockInterface;
use Monolog\Logger as Monolog;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

final class Logger
{
    public Monolog $logger;

    public function __construct(string $name = 'elite_league_client', array $handlers = [], array $processors = [], ?DateTimeZone $timezone = null, ?ClockInterface $clock = null)
    {
        $logPath = __DIR__ . DIRECTORY_SEPARATOR . $name . '.log';
        $handlers = array_merge($handlers, [
            new StreamHandler($logPath),
            new FirePHPHandler(),
        ]);

        $this->logger = new Monolog($name, $handlers, $processors, $timezone, $clock);
    }

    public function addDebug(string $message, array $context = [])
    {
        $this->logger->debug($message, $context);
    }

    public function addInfo(string $message, array $context = [])
    {
        $this->logger->info($message, $context);
    }

    public function addNotice(string $message, array $context = [])
    {
        $this->logger->notice($message, $context);
    }

    public function addWarning(string $message, array $context = [])
    {
        $this->logger->warning($message, $context);
    }

    public function addError(string $message, array $context = [])
    {
        $this->logger->error($message, $context);
    }

    public function addCritical(string $message, array $context = [])
    {
        $this->logger->critical($message, $context);
    }

    public function addAlert(string $message, array $context = [])
    {
        $this->logger->alert($message, $context);
    }

    public function addEmergency(string $message, array $context = [])
    {
        $this->logger->emergency($message, $context);
    }
}
