<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UniversityScholarship
 * @package App\Models
 * @version March 3, 2021, 5:03 pm WIB
 *
 * @property integer $university_id
 * @property string $description
 * @property string $picture
 * @property integer $year
 */
class UniversityScholarship extends Model
{
  use SoftDeletes;

  public $table = 'university_scholarships';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'university_id',
    'description',
    'picture',
    'year'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'university_id' => 'integer',
    'description' => 'string',
    'picture' => 'string',
    'year' => 'integer'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'university_id' => 'required|integer',
    'description' => 'nullable|string',
    'picture' => 'nullable|string',
    'year' => 'nullable|integer',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable'
  ];

  public function university(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(University::class, 'university_id');
  }

  public function scopeApiSearch($query, $param)
  {
    return $query->when($param, function ($query) use ($param) {
      return $query->where('description', 'LIKE', "%$param%");
    })->get();
  }
}
