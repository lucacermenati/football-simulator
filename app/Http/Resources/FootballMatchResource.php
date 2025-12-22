<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="FootballMatch",
 *     title="Football Match Resource",
 *     description="Football match resource representation"
 * )
 */
class FootballMatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @OA\Property(property="id", type="string", format="uuid", example="123e4567-e89b-12d3-a456-426614174000", description="Football match unique identifier")
     * @OA\Property(property="date", type="string", format="date", example="2023-10-15", description="Date of the match")
     * @OA\Property(property="goal_home", type="integer", example=2, description="Number of goals scored by home team")
     * @OA\Property(property="goal_away", type="integer", example=1, description="Number of goals scored by away team")
     * @OA\Property(property="created_at", type="string", format="datetime", example="2023-10-16T10:00:00.000000Z", description="Creation timestamp")
     * @OA\Property(property="updated_at", type="string", format="datetime", example="2023-10-16T10:00:00.000000Z", description="Last update timestamp")
     * @OA\Property(property="competition", ref="#/components/schemas/Competition", description="Competition information")
     * @OA\Property(property="home_team", ref="#/components/schemas/Team", description="Home team information")
     * @OA\Property(property="away_team", ref="#/components/schemas/Team", description="Away team information")
     * @OA\Property(property="scorers", type="array", @OA\Items(ref="#/components/schemas/Player"), description="Players who scored goals")
     * @OA\Property(property="scorers_with_minutes", type="array", @OA\Items(type="object", @OA\Property(property="player", ref="#/components/schemas/Player"), @OA\Property(property="minute", type="integer", example=45)), description="Players who scored with minute details")
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            // 'id' => $this->id,
            // 'date' => $this->date,
            // 'goal_home' => $this->goal_home,
            // 'goal_away' => $this->goal_away,
            // 'played' => $this->played,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
            // 'competition' => new CompetitionResource($this->whenLoaded('competition')),
            // 'home_team' => new TeamResource($this->whenLoaded('homeTeam')),
            // 'away_team' => new TeamResource($this->whenLoaded('awayTeam')),
            // 'scorers' => PlayerResource::collection($this->whenLoaded('scorers')),
            // 'scorers_with_minutes' => $this->when($this->relationLoaded('scorers'), function() {
            //     return $this->scorers->map(function($player) {
            //         return [
            //             'player' => new PlayerResource($player),
            //             'minute' => $player->pivot->minute
            //         ];
            //     });
            // }),
            'home_team' => $this->homeTeam->name,
            'away_team' => $this->awayTeam->name,
            'date' => $this->date->format('Y-m-d'),
        ];
    }
}