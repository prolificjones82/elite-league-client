<?php

namespace EliteLeagueClient\Game\Response;

use EliteLeagueClient\Interfaces\ReadonlyInterface;

final readonly class GoalieStatResponse implements ReadonlyInterface
{
    /**
     * @param array<string, mixed> $data Raw payload until the response shape is modelled.
     */
    public function __construct(
        public array $data,
    ) {}

    public function toArray(): array
    {
        return $this->data;
    }

    public static function fromArray(array $data): self
    {
        return new self($data);
    }
}
