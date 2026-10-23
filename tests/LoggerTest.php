<?php

declare(strict_types=1);

use Monolog\Level;
use EliteLeagueClient\Logger;
use PHPUnit\Framework\TestCase;
use Monolog\Handler\AbstractHandler;

final class LoggerTest extends TestCase
{
    private function assertDefaultHandlerLevel(?string $value, Level $expectedLevel): void
    {
        $key = 'ELITE_LEAGUE_VERBOSE_LOGGING';
        $hadEnv = array_key_exists($key, $_ENV);
        $previousEnv = $_ENV[$key] ?? null;
        $hadServer = array_key_exists($key, $_SERVER);
        $previousServer = $_SERVER[$key] ?? null;
        $previousProcessValue = getenv($key);

        try {
            if ($value === null) {
                unset($_ENV[$key], $_SERVER[$key]);
                putenv($key);
            } else {
                $_ENV[$key] = $value;
                $_SERVER[$key] = $value;
                putenv($key . '=' . $value);
            }

            $logger = new Logger('elite_league_logger_test');
            foreach ($logger->logger->getHandlers() as $handler) {
                self::assertInstanceOf(AbstractHandler::class, $handler);
                self::assertSame($expectedLevel, $handler->getLevel());
            }
        } finally {
            if ($hadEnv) {
                $_ENV[$key] = $previousEnv;
            } else {
                unset($_ENV[$key]);
            }

            if ($hadServer) {
                $_SERVER[$key] = $previousServer;
            } else {
                unset($_SERVER[$key]);
            }

            if ($previousProcessValue === false) {
                putenv($key);
            } else {
                putenv($key . '=' . $previousProcessValue);
            }
        }
    }
    public function testNonErrorLogsAreDisabledByDefault(): void
    {
        $this->assertDefaultHandlerLevel(null, Level::Error);
    }

    public function testVerboseLoggingEnablesAllLogLevels(): void
    {
        $this->assertDefaultHandlerLevel('true', Level::Debug);
    }

    public function testFalseDisablesVerboseLogging(): void
    {
        $this->assertDefaultHandlerLevel('false', Level::Error);
    }
}
