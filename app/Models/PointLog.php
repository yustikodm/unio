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
    'parent_id',
    'transaction_id',
    'transaction_type',
    'point_before',
    'point_after'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'parent_id' => 'integer',
    'transaction_id' => 'integer',
    'transaction_type' => 'string',
    'point_before' => 'decimal:2',
    'point_after' => 'decimal:2',
    // 'created_at' => 'datetime'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'parent_id' => 'requried|integer',
    'transaction_id' => 'requried|integer',
    'transaction_type' => 'requried|string',
    'point_before' => 'requried|decimal',
    'point_after' => 'requried|decimal',
  ];

  public function transaction()
  {
    return $this->belongsTo(Transaction::class);
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
        'point_before' => 0,
        'parent_id' => $parentId
      ];
    }

    return $point;
  }
}
