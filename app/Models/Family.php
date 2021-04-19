<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Family
 * @package App\Models
 * @version March 31, 2021, 10:35 am WIB
 *
 */
class Family extends Model
{
  use SoftDeletes;

  public $table = 'families';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'parent_user',
    'child_user',
    'family_as',
    'family_verified_at',
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'parent_user' => 'integer',
    'child_user' => 'integer',
    'family_as' => 'string',
    'family_verified_at' => 'datetime',
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'parent_user' => 'required|integer',
    'child_user' => 'required|integer',
    'family_as' => 'required|string',
    'family_verified_at' => 'nullable|datetime',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable',
  ];

  public function parent()
  {
    return $this->belongsTo(User::class, 'parent_user');
  }

  public function child()
  {
    return $this->belongsTo(User::class, 'child_user');
  }
}
