<?php

namespace EliteLeagueClient\Game\Response;

use EliteLeagueClient\Interfaces\ReadonlyInterface;
use EliteLeagueClient\Game\Response\Data\GoalieStatData;

final readonly class GoalieStatResponse implements ReadonlyInterface
{
    public function __construct(
        /**
         * @var array<int, GoalieStatData>
         */
        public array $data,
    ) {}

    public function toArray(): array
    {
        return [
            'data' => array_map(
                GoalieStatData::fromArray(...),
                $this->data,
            ),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            data: array_map(
                static fn(GoalieStatData $goalie) => $goalie->toArray(),
                $data['data'] ?? [],
            ),
        );
    }
}
