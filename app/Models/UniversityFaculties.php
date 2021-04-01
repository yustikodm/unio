<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UniversityFaculties
 * @package App\Models
 * @version March 3, 2021, 5:08 pm WIB
 *
 * @property integer $university_id
 * @property string $name
 * @property string $description
 */
class UniversityFaculties extends Model
{
  use SoftDeletes;

  public $table = 'university_faculties';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $dates = ['deleted_at'];

  public $fillable = ['university_id', 'name', 'description'];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'university_id' => 'integer',
    'name' => 'string',
    'description' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'university_id' => 'required|integer',
    'name' => 'required|string|max:255',
    'description' => 'nullable|string|max:255',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable'
  ];

  public function university(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(University::class, 'university_id');
  }

  public function major()
  {
    return $this->hasMany(UniversityMajor::class);
  }

  public function fee()
  {
    return $this->hasMany(UniversityFee::class);
  }

  public function scopeApiSearch($query, $param)
  {
    return $query->when($param, function ($query) use ($param) {
      return $query->where('name', 'LIKE', "%$param%");
    })->get();
  }
}
