<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PremierLig
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
}
