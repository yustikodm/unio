<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PricingPoint
 * @package App\Models
 * @version March 31, 2021, 10:52 am WIB
 *
 */
class PricingPoint extends Model;
{
    use SoftDeletes;

    public $table = 'pricing_points';

    protected $dates = ['deleted_at'];

    public $fillable = [
      'entity_id',
      'entity_type',
      'amount',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
      'id' => 'integer',
      'entity_id' => 'integer',
      'entity_type' => 'string',
      'amount' => 'decimal',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      'entity_id' => 'required|integer',
      'entity_type' => 'required|string',
      'amount' => 'required|decimal',
    ];

    
}
