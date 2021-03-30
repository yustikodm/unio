<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UniversityMajor
 * @package App\Models
 * @version March 3, 2021, 5:02 pm WIB
 *
 * @property integer $university_id
 * @property integer $faculty_id
 * @property string $name
 * @property string $description
 * @property string $accreditation
 * @property string $temp
 */
class UniversityMajor extends Model
{
  use SoftDeletes;

  public $table = 'university_majors';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'university_id',
    'faculty_id',
    'name',
    'description',
    'accreditation',
    'temp'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'university_id' => 'integer',
    'faculty_id' => 'integer',
    'name' => 'string',
    'description' => 'string',
    'accreditation' => 'string',
    'temp' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'university_id' => 'required|integer',
    'faculty_id' => 'required|integer',
    'name' => 'required|string|max:255',
    'description' => 'nullable|string|max:255',
    'accreditation' => 'nullable|string|max:255',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable'
  ];

  public function university(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(University::class, 'university_id');
  }

  public function faculty(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(UniversityFaculties::class, 'faculty_id');
  }

  public function requirement()
  {
    return $this->hasMany(UniversityRequirement::class);
  }

  public function wishlist()
  {
    return $this->hasMany(Wishlist::class);
  }
}
