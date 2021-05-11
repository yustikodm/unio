<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Biodata
 * @package App\Models
 * @version March 31, 2021, 10:43 am WIB
 *
 */
class Biodata extends Model
{
  use SoftDeletes;

  public $timestamps = false;

  public $table = 'biodata';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'user_id',
    'fullname',
    'address',
    'gender', 
    'picture',
    'school_origin',
    'graduation_year',
    'birth_place',
    'birth_date',
    'identity_number',
    'religion_id',
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'user_id' => 'integer',
    'fullname' => 'string',
    'address' => 'string',
    'gender' => 'string',
    'picture' => 'string',
    'school_origin' => 'string',
    'graduation_year' => 'string',
    'birth_place' => 'string',
    'birth_date' => 'date',
    'identity_number' => 'string',
    'religion_d' => 'integer',
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'user_id' => 'required|integer',
    'fullname' => 'required',
    'address' => 'nullable|string',
    'picture' => 'nullable|file',
    'school_origin' => 'nullable|string',
    'graduation_year' => 'nullable',
    'birth_place' => 'nullable|string',
    'birth_date' => 'nullable|date',
    'identity_number' => 'nullable|string',
    'religion_id' => 'nullable|integer',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }

  public static function findByUser($user_id)
  {
    return static::where('user_id', $user_id)
                ->first();
  }

}
