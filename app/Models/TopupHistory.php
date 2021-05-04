<?php

namespace App\Models;

use App\User;
use Composer\Package\Package;
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
    'payment_method',
    'payment_trans',
    'status'
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
    'payment_method' => 'string',
    'payment_trans' => 'string',
    'status'
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
    'amount' => 'nullable',
    'code' => 'nullable',
    'payment_method' => 'nullable',
    'payment_trans' => 'nullable',
    'status' => 'nullable'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function country()
  {
    return $this->belongsTo(Country::class);
  }

  public function package()
  {
    return $this->belongsTo(TopupPackage::class);
  }
}
