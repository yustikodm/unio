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

  public function scopeApiSearch($query, $param)
  {
    return $query->when($param, function ($query) use ($param) {
      return $query->where('name', 'LIKE', "%$param%");
    })->get();
  }
}
