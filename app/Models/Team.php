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
        'won',
        'drawn,',
        'lost',
        'goals_for',
        'goals_against',
        'goal_difference',
    ];

    public function updateStatusOfGame($teamScore, $againstTeamScore): Team
    {
        $status = $teamScore - $againstTeamScore;

        switch ($status) {
            case $status > 0:
                $this->won += 1;
                break;
            case $status < 0:
                $this->lost += 1;
                break;
            default:
                $this->drawn += 1;
        }
        return $this;
        /*if ($teamScore > $againstTeamScore) {
            $this->won += 1;
            return $this;
        } else if ($teamScore < $againstTeamScore) {
            $this->lost += 1;
            return $this;
        }
        $this->drawn += 1;
        return $this;*/
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



    public function updateTeamStatus() {
        $this->incrementPlayed();
        $this->updateStatusOfGame();
        $this->updateGoals();
        $this->save();
    }
}
