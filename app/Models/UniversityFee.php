<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UniversityFee
 * @package App\Models
 * @version March 3, 2021, 5:02 pm WIB
 *
 * @property integer $university_id
 * @property integer $faculty_id
 * @property integer $major_id
 * @property integer $currency_id
 * @property string $type
 * @property integer $admission_fee
 * @property integer $semester_fee
 * @property string $description
 */
class UniversityFee extends Model
{
  use SoftDeletes;

  public $table = 'university_fees';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'university_id',
    'faculty_id',
    'major_id',
    'currency_id',
    'type',
    'admission_fee',
    'semester_fee',
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
    'faculty_id' => 'integer',
    'major_id' => 'integer',
    'currency_id' => 'integer',
    'type' => 'string',
    'admission_fee' => 'integer',
    'semester_fee' => 'integer',
    'description' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'university_id' => 'required|integer',
    'faculty_id' => 'required|integer',
    'major_id' => 'required|integer',
    'currency_id' => 'required|integer',
    'type' => 'required|string|max:50',
    'admission_fee' => 'required',
    'semester_fee' => 'required',
    'description' => 'required|string|max:255',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable'
  ];

  public function major(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(UniversityMajor::class, 'major_id');
  }

}
