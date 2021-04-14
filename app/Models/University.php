<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class University
 * @package App\Models
 * @version March 3, 2021, 5:01 pm WIB
 *
 * @property integer $country_id
 * @property integer $state_id
 * @property integer $district_id
 * @property string $name
 * @property string $description
 * @property string $logo_src
 * @property string $type
 * @property string $accreditation
 * @property string $address
 */
class University extends Model
{
  use SoftDeletes;

  public $table = 'universities';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'country_id',
    'state_id',
    'district_id',
    'name',
    'description',
    'logo_src',
    'type',
    'accreditation',
    'address'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'country_id' => 'integer',
    'state_id' => 'integer',
    'district_id' => 'integer',
    'name' => 'string',
    'description' => 'string',
    'logo_src' => 'string',
    'type' => 'string',
    'accreditation' => 'string',
    'address' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'country_id' => 'nullable|integer',
    'state_id' => 'nullable|integer',
    'district_id' => 'nullable|integer',
    'name' => 'required|string|max:255',
    'description' => 'nullable|string',
    'logo_src' => 'nullable|string|max:200',
    'type' => 'string|max:255',
    'accreditation' => 'string|max:255',
    'address' => 'nullable|string',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable'
  ];

  public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(Country::class, 'country_id');
  }

  public function state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(State::class, 'state_id');
  }

  public function district(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(District::class, 'district_id');
  }

  public function faculty()
  {
    return $this->hasMany(UniversityFaculties::class);
  }

  public function fee()
  {
    return $this->hasMany(UniversityFee::class);
  }

  public function major()
  {
    return $this->hasMany(UniversityMajor::class);
  }

  public function requirement()
  {
    return $this->hasMany(UniversityRequirement::class);
  }

  public function scholarship()
  {
    return $this->hasMany(UniversityScholarship::class);
  }

  public function wishlist()
  {
    return $this->hasMany(Wishlist::class);
  }

  public function university()
  {
    return $this->hasMany(UniversityMajor::class, 'universities.id');
  }

  public function scopeApiSearch($query, $param, $major = "", $country = "", $state = "", $district = "")
  {
    $search = $query->when($param, function ($query) use ($param) {
      return $query->where('universities.name', 'LIKE', "%$param%");
    })
      ->when($country, function ($query) use ($country) {
        return $query->join('countries', 'countries.id', 'universities.country_id')
          ->where('countries.id', $country);
      })
      ->when($state, function ($query) use ($state) {
        return $query->join('states', 'states.id', 'universities.state_id')
          ->where('states.id', $state);
      })
      ->when($district, function ($query) use ($district) {
        return $query->join('districts', 'districts.id', 'universities.district_id')
          ->where('districts.id', $district);
      })
      ->when($major, function ($query) use ($major) {
        $query->join('university_majors', 'university_majors.university_id', 'universities.id')
          ->where('university_majors.name', 'LIKE', "%$major%")
          ->orWhere('university_majors.id', "$major");
      });

    $select_list = ['universities.*'];

    if (!empty($major)) {
      $select_list = array_merge($select_list, [
        'university_majors.id as um_id',
        'university_majors.university_id as um_university_id',
        'university_majors.faculty_id as um_faculty_id',
        'university_majors.name as um_name',
        'university_majors.description as um_description',
        'university_majors.accreditation as um_accreditation',
        'university_majors.temp as um_temp',
        'university_majors.created_at as um_created_at',
        'university_majors.updated_at as um_updated_at',
      ]);
    }

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

    return $search->select($select_list);
  }
}
