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
class PremierLig extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'car_brands';

    protected $casts = [
        'name'                 => 'string',
        'overall_strength'     => 'integer',
        'overall_agility'      => 'integer',
        'overall_intelligence' => 'integer',
    ];

    protected $fillable = [
        'name',
        'overall_strength',
        'first_manufacture_year',
    ];
}
