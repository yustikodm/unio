<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UniversityRequirement
 * @package App\Models
 * @version March 3, 2021, 5:03 pm WIB
 *
 * @property integer $university_id
 * @property integer $major_id
 * @property string $name
 * @property integer $value
 * @property string $description
 */
class UniversityRequirement extends Model
{
  use SoftDeletes;

  public $table = 'university_requirements';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $dates = ['deleted_at'];

  protected $with = ['university', 'major'];

  public $fillable = [
    'university_id',
    'major_id',
    'name',
    'value',
    'description'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'university_id' => 'integer',
    'major_id' => 'integer',
    'name' => 'string',
    'value' => 'integer',
    'description' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'university_id' => 'required|integer',
    'major_id' => 'required|integer',
    'name' => 'required|string|max:255',
    'value' => 'required|integer',
    'description' => 'nullable|string',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable'
  ];

  public function university(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(University::class, 'university_id');
  }
  
  public function major(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(UniversityMajor::class, 'major_id');
  }
}
