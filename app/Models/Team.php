<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function GuzzleHttp\Psr7\_caseless_remove;

/**
 * Class Team
 *
 * @property int     $id
 * @property string  $name
 * @property integer $overall_strength
 * @property integer $overall_agility
 * @property integer $overall_intelligence
 * @property integer $points
 * @property integer $played
 * @property integer $won
 * @property integer $drawn
 * @property integer $lost
 * @property integer $goals_for
 * @property integer $goals_against
 * @property integer $goal_difference
 * @property Carbon  $created_at
 * @property Carbon  $updated_at
 * @property string  $deleted_at
 * @mixin Builder
 */
class Team extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'teams';

    protected $casts = [
        'name'                 => 'string',
        'overall_strength'     => 'integer',
        'overall_agility'      => 'integer',
        'overall_intelligence' => 'integer',
        'points'               => 'integer',
        'played'               => 'integer',
        'won'                  => 'integer',
        'drawn'                => 'integer',
        'lost'                 => 'integer',
        'goals_for'            => 'integer',
        'goals_against'        => 'integer',
        'goal_difference'      => 'integer',
    ];

    protected $fillable = [
        'name',
        'overall_strength',
        'overall_agility',
        'overall_intelligence',
        'overall_intelligence',
        'played',
        'points',
        'won',
        'draw',
        'lost',
        'goals_for',
        'goals_against',
        'goal_difference',
    ];
    /**
     * @var int|mixed
     */
    public $pointsWon;


    public function updateStatusOfGame($status): Team
    {
        switch ($status) {
            case $status == 'WON':
                $this->won += 1;
                $this->pointsWon = 3;
                $this->points += $this->pointsWon;
                break;
            case $status < 0:
                $this->pointsWon = 0;
                $this->lost += 1;
                break;
            default:
                $this->draw += 1;
                $this->pointsWon = 1;
                $this->points += $this->pointsWon;
        }
        return $this;
    }

    public function updateGoals($teamScore, $againstTeamScore): Team
    {
        $this->goals_for += $teamScore;
        $this->goals_against += $againstTeamScore;
        return $this;
    }

    public function incrementPlayed(): Team
    {
        $this->played += 1;
        return $this;
    }

    public function pointsWon(): int {
        return $this->pointsWon;
    }

    public function updateTeamStatus($teamScore, $againstTeamScore) {
        $this->updateTeamStatusWithoutSave($teamScore, $againstTeamScore);
        $this->save();
    }

    public function updateTeamStatusWithoutSave($teamScore, $againstTeamScore) {
        $this->incrementPlayed();
        $this->updateStatusOfGame($teamScore, $againstTeamScore);
        $this->updateGoals($teamScore, $againstTeamScore);
        return $this;
    }
}
