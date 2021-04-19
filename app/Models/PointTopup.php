<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PointTopup
 * @package App\Models
 * @version March 31, 2021, 11:03 am WIB
 *
 */
class PointTopup extends Model
{
  use SoftDeletes;

  public $table = 'point_topup';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'user_id',
    'country_id',
    'amount',
    'point_conversion'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'user_id' => 'integer',
    'country_id' => 'integer',
    'amount' => 'decimal:2',
    'point_conversion' => 'decimal:2'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'user_id' => 'required|integer',
    'country_id' => 'required|integer',
    'amount' => 'required|decimal',
    'point_conversion' => 'required|decimal'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function country()
  {
    return $this->belongsTo(Country::class);
  }
}
