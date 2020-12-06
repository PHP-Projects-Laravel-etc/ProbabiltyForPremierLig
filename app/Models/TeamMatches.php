<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TeamMatches
 *
 * @property int     $id
 * @property integer $home_team_id
 * @property integer $away_team_id
 * @property integer $home_team_score
 * @property integer $away_team_score
 * @property Carbon  $created_at
 * @property Carbon  $updated_at
 * @property string  $deleted_at
 * @mixin Builder
 */
class TeamMatches extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'team_matches';

    protected $casts = [
        'home_team_id'    => 'string',
        'away_team_id'    => 'integer',
        'home_team_score' => 'integer',
        'away_team_score' => 'integer',
    ];

    protected $fillable = [
        'home_team_id',
        'away_team_id',
        'home_team_score',
        'away_team_score',
    ];

    public function homeTeam() {
       return  $this->hasOne(Team::class,'id','home_team_id');
    }

    public function awayTeam() {
        return  $this->belongsTo(Team::class,'id','away_team_id');
    }
}
