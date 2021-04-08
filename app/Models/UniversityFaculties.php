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

  public function scopeApiSearch($query, $param, $major, $university, $country, $state, $district)
  {
    $search = $query->when($param, function ($query) use ($param) {
      return $query->where('university_faculties.name', "$param");
    })
      ->when($country, function ($query) use ($country) {
        return $query->join('universities', 'universities.id', 'university_faculties.university_id')
          ->where('universities.country_id', $country)
          ->select($this->selectCustom());
      })
      ->when($state, function ($query) use ($state) {
        return $query->join('universities', 'universities.id', 'university_faculties.university_id')
          ->where('universities.state_id', $state)
          ->select($this->selectCustom());
      })
      ->when($district, function ($query) use ($district) {
        return $query->join('universities', 'universities.id', 'university_faculties.university_id')
          ->where('universities.district_id', $district)
          ->select($this->selectCustom());
      })
      ->when($university, function ($query) use ($university) {
        return $query->join('universities', 'universities.id', 'university_faculties.university_id')
          ->where('universities.name', 'LIKE', "%$university%")
          ->select($this->selectCustom());
      })
      ->when($major, function ($query) use ($major) {
        $query->join('university_majors', 'university_majors.university_id', 'universities.id')
          ->where('university_majors.name', 'LIKE', "%$major%")
          ->select(
            'university_majors.id as um_id',
            'university_majors.university_id as um_university_id',
            'university_majors.faculty_id as um_faculty_id',
            'university_majors.name as um_name',
            'university_majors.description as um_description',
            'university_majors.accreditation as um_accreditation',
            'university_majors.temp as um_temp'
          );
      });

      return $search->get();
  }

  public function selectCustom($major = "")
  {
    $select = [
      'university_faculties.id as uf_id',
      'university_faculties.name as uf_name',
      'university_faculties.description as uf_description',
      'universities.id as u_id',
      'universities.name as u_name',
      'universities.description as u_description',
      'universities.logo_src as u_logo_src',
      'universities.type as u_type',
      'universities.accreditation as u_accreditation',
      'universities.address as u_address',
      'universities.country_id',
      'universities.state_id',
      'universities.district_id',
    ];

    if ($major === true) {
      $select = array_merge($select, [
        'university_majors.id as um_id',
        'university_majors.university_id as um_university_id',
        'university_majors.faculty_id as um_faculty_id',
        'university_majors.name as um_name',
        'university_majors.description as um_description',
        'university_majors.accreditation as um_accreditation',
        'university_majors.temp as um_temp'
      ]);
    }

    return $select;
  }
}
