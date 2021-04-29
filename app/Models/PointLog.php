<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PointLog
 * @package App\Models
 * @version March 31, 2021, 11:04 am WIB
 *
 */
class PointLog extends Model
{
  use SoftDeletes;

  public $table = 'point_log';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'user_id',
    'transaction_id',
    'transaction_type',
    'point_before',
    'point_amount',
    'point_after'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'user_id' => 'integer',
    'transaction_id' => 'integer',
    'transaction_type' => 'string',
    'point_before' => 'integer',
    'point_amount' => 'integer',
    'point_after' => 'integer',
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'user_id' => 'required|integer',
    'transaction_id' => 'required|integer',
    'transaction_type' => 'required|string',
    'point_before' => 'required',
    'point_amount' => 'required',
    'point_after' => 'required',
  ];

  public function transaction()
  {
    return $this->belongsTo(Transaction::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function parent()
  {
    return $this->belongsTo(User::class);
  }

  public static function getPointData($parentId)
  {
    $point = static::where('parent_id', $parentId)->first();

    if (empty($point)) {
      return (object) [
        'point_after' => 0,
        'parent_id' => $parentId
      ];
    }

    return $point;
  }

  public static function getFamilyPoint($parentId)
  {
    return static::where('parent_id', $parentId)
      ->latest('point_log.created_at')
      ->first();
  }
}
