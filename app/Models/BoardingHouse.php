<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BoardingHouse
 * @package App\Models
 * @version March 18, 2021, 10:57 am WIB
 *
 * @property integer $country_id
 * @property integer $state_id
 * @property integer $district_id
 * @property string $name
 * @property string $description
 * @property integer $price
 * @property string $address
 * @property string $phone
 * @property string $picture
 */
class BoardingHouse extends Model
{
  use SoftDeletes;

  public $table = 'boarding_houses';


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
    'country_id' => 'nullable',
    'state_id' => 'nullable',
    'district_id' => 'nullable',
    'name' => 'required',
    'description' => 'nullable',
    'price' => 'nullable',
    'address' => 'required',
    'phone' => 'nullable',
    'picture' => 'nullable'
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
}
