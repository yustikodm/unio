<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TopupHistory
 * @package App\Models
 * @version March 31, 2021, 11:03 am WIB
 *
 */
class TopupHistory extends Model
{
  use SoftDeletes;

  public $table = 'topup_history';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'user_id',
    'country_id',
    'package_id',
    'code',
    'amount',
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
    'package_id' => 'integer',
    'code' => 'string',
    'amount' => 'integer',
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'user_id' => 'required|integer',
    'country_id' => 'required|integer',
    'package_id' => 'required|integer',
    'code' => 'required|unique:topup_history,code',
    'amount' => 'required',
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
