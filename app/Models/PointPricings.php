<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PointPricings
 * @package App\Models
 * @version April 15, 2021, 2:02 pm WIB
 *
 * @property integer $entity_id
 * @property string $entity_type
 * @property number $amount
 */
class PointPricings extends Model
{
    use SoftDeletes;

    public $table = 'point_pricings';
    
    protected $dates = ['deleted_at'];

    public $fillable = ['entity_id', 'entity_type', 'amount'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'entity_id' => 'integer',
        'entity_type' => 'string',
        'amount' => 'decimal:2'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'entity_id' => 'required',
        'entity_type' => 'required',
        'amount' => 'required'
    ];

    
}
