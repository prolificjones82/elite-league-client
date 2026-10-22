<?php

namespace EliteLeagueClient\Game\Response;

use EliteLeagueClient\Response\ResultResponse;
use EliteLeagueClient\Interfaces\ReadonlyInterface;

final readonly class GameInfoResponse implements ReadonlyInterface
{
    public function __construct(
        public string $actualTimeName,
        public string $actualTimeAlias,
        public string $stadium,
        public int $numberOfViewers,
        public RefereeResponse $referees,
        public TeamResponse $teamInfo,
        public TrainerResponse $trainers,
        public BilanceResponse $teamBilance,
        public ResultResponse $results,
        public RosterResponse $roster,
    ) {}

    public function toArray(): array
    {
        return [
            'actualTimeName' => $this->actualTimeName,
            'actualTimeAlias' => $this->actualTimeAlias,
            'stadium' => $this->stadium,
            'numberOfViewers' => $this->numberOfViewers,
            'referees' => $this->referees->toArray(),
            'teamInfo' => $this->teamInfo->toArray(),
            'trainers' => $this->trainers->toArray(),
            'teamBilance' => $this->teamBilance->toArray(),
            'results' => $this->results->toArray(),
            'roster' => $this->roster->toArray(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            actualTimeName: $data['actualTimeName'],
            actualTimeAlias: $data['actualTimeAlias'],
            stadium: $data['stadium'],
            numberOfViewers: $data['numberOfViewers'],
            referees: RefereeResponse::fromArray($data['referees']),
            teamInfo: TeamResponse::fromArray($data['teamInfo']),
            trainers: TrainerResponse::fromArray($data['trainers']),
            teamBilance: BilanceResponse::fromArray($data['teamBilance']),
            results: ResultResponse::fromArray($data['results']),
            roster: RosterResponse::fromArray($data['roster']),
        );
    }
}
