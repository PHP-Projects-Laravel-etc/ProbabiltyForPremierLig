<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PremierLigPlan
 *
 * @property int     $id
 * @property integer $home_team_id
 * @property integer $away_team_id
 * @property Carbon  $match_date
 * @property Carbon  $created_at
 * @property Carbon  $updated_at
 * @property string  $deleted_at
 * @mixin Builder
 */
class PremierLigPlan extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'premier_lig_plans';

    protected $casts = [
        'home_team_id' => 'string',
        'away_team_id' => 'integer',
        'match_date'   => 'date',
    ];

    protected $fillable = [
        'home_team_id',
        'away_team_id',
        'match_date',
    ];

    public function teamHome() {
        $this->hasMany(Team::class,'id','home_team_id');
    }

    public function teamAway() {
        $this->hasMany(Team::class,'id','away_team_id');
    }

}
