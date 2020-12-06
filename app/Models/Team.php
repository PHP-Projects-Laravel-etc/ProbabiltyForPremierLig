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
    ];

    protected $fillable = [
        'name',
        'overall_strength',
        'overall_agility',
        'overall_intelligence',
    ];


    public function premierLigPlanHome() {
        $this->hasMany(PremierLigPlan::class,'home_team_id','id');
    }

    public function premierLigPlanAway() {
        $this->hasMany(PremierLigPlan::class,'away_team_id','id');
    }


}
