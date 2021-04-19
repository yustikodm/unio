<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PointTransaction
 * @package App\Models
 * @version March 31, 2021, 10:59 am WIB
 *
 */
class PointTransaction extends Model
{
  use SoftDeletes;

  public $table = 'point_transactions';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'user_id',
    'entity_id',
    'entity_type',
    'amount',
    'point_conversion',
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'user_id' => 'integer',
    'entity_id' => 'integer',
    'entity_type' => 'string',
    'amount' => 'decimal:2',
    'point_conversion' => 'decimal:2',
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'user_id' => 'required',
    'entity_id' => 'required',
    'entity_type' => 'required',
    'amount' => 'required',
    'point_conversion' => 'required',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function point_log()
  {
    return $this->hasMany(PointLog::class);
  }
}
