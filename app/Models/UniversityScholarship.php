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
    'name',
    'description',
    'picture',
    'year'
  ];

  protected $with = ['university'];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'university_id' => 'integer',
    'name' => 'string',
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
    'name' => 'required|string',
    'description' => 'nullable|string',
    'picture' => 'nullable',
    'year' => 'nullable|integer',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable'
  ];

  public function university()
  {
    return $this->belongsTo(University::class);
  }

  public function scopeApiSearch($query, $param, $university, $country, $state, $district)
  {
    $search = $query->when($param, function ($query) use ($param) {
      return $query->where('university_scholarships.description', 'LIKE', "%$param%");
    })
      ->when($university or $country or $state or $district, function ($query) use ($university, $country, $state, $district) {
        $univ = $query->join('universities', 'universities.id', 'university_scholarships.university_id')
          ->where('universities.name', 'LIKE', "%$university%")
          ->orWhere('universities.id', $university);

        return $univ->when($country, function ($query) use ($country) {
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
          });
      });

    $select_list = ['university_scholarships.*'];

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
}
