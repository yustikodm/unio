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
 * @property string $level
 */
class UniversityMajor extends Model
{
  use SoftDeletes;

  public $table = 'university_majors';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $dates = ['deleted_at'];

  protected $with = ['university', 'faculty'];

  public $fillable = [
    'university_id',
    'faculty_id',
    'name',
    'level',
    'accreditation',
    'description',
    'master_id'
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
    'level' => 'string',
    'master_id' => 'integer'
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
    'level' => 'nullable|string',
    'master_id' => 'integer',
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

  public function fee()
  {
    return $this->hasMany(UniversityFee::class);
  }

  public function master()
  {
    return $this->belongsTo(MasterMajor::class);
  }

  public function scopeApiSearch($query, $param, $university, $country, $state, $district)
  {
    $search = $query->when($param, function ($query) use ($param) {
      return $query->where('university_majors.name', 'LIKE', "%$param%");
    })
      ->when($university , function ($query) use ($university) {
        return $query->join('universities', 'universities.id', 'university_majors.university_id')
          ->where('universities.name', 'LIKE', "%$university%");
      })->when($country, function ($query) use ($country) {
        return $query->join('universities as ua', 'ua.id', 'university_majors.university_id')
          ->join('countries', 'countries.id', 'ua.country_id')
          ->where('countries.id', $country);
      })
      ->when($state, function ($query) use ($state) {
        return $query->join('universities as ub', 'ub.id', 'university_majors.university_id')
          ->join('states', 'states.id', 'ub.state_id')
          ->where('states.id', $state);
      })
      ->when($district, function ($query) use ($district) {
        return $query->join('universities as uc', 'uc.id', 'university_majors.university_id')
          ->join('districts', 'districts.id', 'uc.district_id')
          ->where('districts.id', $district);
      });

    $select_list = ['university_majors.*'];

    if (!empty($university)) {
      $select_list = array_merge($select_list, [
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
        'universities.created_at as u_created_at',
        'universities.updated_at as u_updated_at'
      ]);

      if (!empty($country)) {
        $select_list = array_merge($select_list, [
          'countries.id as c_id',
          'countries.name as c_name',
          'countries.created_at as c_created_at',
          'countries.updated_at as c_updated_at'
        ]);
      }

      if (!empty($state)) {
        $select_list = array_merge($select_list, [
          'states.id as s_id',
          'states.name as s_name',
          'states.created_at as s_created_at',
          'states.updated_at as s_updated_at'
        ]);
      }

      if (!empty($district)) {
        $select_list = array_merge($select_list, [
          'districts.id as d_id',
          'districts.name as d_name',
          'districts.created_at as d_created_at',
          'districts.updated_at as d_updated_at'
        ]);
      }
    }

    return $search->select($select_list);
  }

  public function scopeApiSearchByFaculties($query, $faculty_id)
  {
    return $query->where('faculty_id', $faculty_id)->get();
  }

  public function scopeCountMajors($query, $major_id)
  {
      return $query->where('master_id', $major_id)->count();
  }
}
