<?php

namespace EliteLeagueClient\Game\Response\GameEvents;

use EliteLeagueClient\Game\Enums\EventType;
use EliteLeagueClient\Interfaces\ReadonlyInterface;
use EliteLeagueClient\Game\Response\GameEvents\Data\ShootoutData;

final readonly class ShootoutEvent extends BaseEvent implements ReadonlyInterface
{
    public function __construct(int $time, EventType $type, ShootoutData $data)
    {
        parent::__construct($time, $type, $data);
    }

    public function toArray(): array
    {
        return [
            'time' => $this->time,
            'type' => $this->type->value,
            'data' => $this->data->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            time: $data['time'],
            type: EventType::tryFrom($data['type']),
            data: ShootoutData::fromArray($data['data']),
        );
    }
}
