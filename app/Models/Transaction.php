<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * Class Transaction
 * @package App\Models
 * @version March 31, 2021, 10:59 am WIB
 *
 */
class Transaction extends Model
{
  use SoftDeletes;

  public $table = 'transactions';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'user_id',
    'code',
    'grand_total',
    'status',
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'user_id' => 'integer',
    'code' => 'string',
    'grandtotal' => 'integer',
    'status' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'user_id' => 'required',
    'code' => 'required|unique:transactions,code',
    'grandtotal' => 'integer',
    'status' => 'required'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function point_log()
  {
    return $this->hasMany(PointLog::class);
  }

  public static function insertDetails($input)
  {
    return DB::table('transaction_details')->insert($input);
  }
}
