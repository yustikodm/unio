<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PlaceToLive
 * @package App\Models
 * @version March 31, 2021, 3:27 pm WIB
 *
 */
class PlaceToLive extends Model
{
  use SoftDeletes;

  public $table = 'place_to_live';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'country_id',
    'state_id',
    'district_id',
    'name',
    'description',
    'price',
    'address',
    'phone',
    'picture'
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
    'price' => 'integer',
    'address' => 'string',
    'phone' => 'string',
    'picture' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'country_id' => 'required|nullable',
    'state_id' => 'nullable',
    'district_id' => 'nullable',
    'name' => 'required|required',
    'description' => 'nullable',
    'price' => 'nullable',
    'address' => 'required',
    'phone' => 'nullable',
    'picture' => 'nullable'
  ];

  public function country()
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

  public function scopeApiSearch($query, $param, $country, $state, $district)
  {
    $search = $query->when($param, function ($query) use ($param) {
      return $query->where('place_to_live.name', 'LIKE', "%$param%");
    })
      ->when($country, function ($query) use ($country) {
        return $query->join('countries', 'countries.id', 'place_to_live.country_id')
          ->where('countries.id', $country);
      })
      ->when($state, function ($query) use ($state) {
        return $query->join('states', 'states.id', 'place_to_live.state_id')
          ->where('states.id', $state);
      })
      ->when($district, function ($query) use ($district) {
        return $query->join('districts', 'districts.id', 'place_to_live.district_id')
          ->where('districts.id', $district);
      });

    $select_list = ['place_to_live.*'];

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

    return $search->select($select_list)->get();
  }

  public function getCatalog($query)
  {
      $placetolive = DB::table('placetolive')
                      ->selectRaw("id as entity_id, 'placetolive' as entity_type, name");
  }
}
