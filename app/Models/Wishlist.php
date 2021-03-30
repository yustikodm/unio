<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Wishlist
 * @package App\Models
 * @version March 3, 2021, 11:44 pm WIB
 *
 * @property integer $university_id
 * @property integer $major_id
 * @property integer $service_id
 * @property integer $user_id
 * @property string $description
 */
class Wishlist extends Model
{
  use SoftDeletes;

  public $table = 'wishlists';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'major_id',
    'service_id',
    'user_id',
    'description'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'major_id' => 'integer',
    'service_id' => 'integer',
    'user_id' => 'integer',
    'description' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'major_id' => 'nullable|integer',
    'service_id' => 'nullable|integer',
    'user_id' => 'required|integer',
    'description' => 'nullable|string',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function service()
  {
    return $this->belongsTo(VendorService::class);
  }

  public function university_major()
  {
    return $this->belongsTo(University::class);
  }
}
