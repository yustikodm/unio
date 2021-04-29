<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Country
 * @package App\Models
 * @version March 3, 2021, 3:00 pm WIB
 *
 * @property string $name
 */
class Country extends Model
{
  use SoftDeletes;

  public $table = 'countries';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $dates = ['deleted_at'];

  public $fillable = ['code', 'name', 'region', 'currency_code', 'currency_name'];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'code' => 'string',
    'name' => 'string',
    'region' => 'string',
    'currency_code' => 'string',
    'currency_name' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'code' => 'nullable|string',
    'name' => 'required|string|max:255',
    'region' => 'nullable|string',
    'currency_code' => 'nullable|string',
    'currency_name' => 'nullable|string'
  ];

  public function state()
  {
    return $this->hasMany(State::class);
  }

  public function live()
  {
    return $this->hasMany(PlaceToLive::class);
  }

  public function university()
  {
    return $this->hasMany(University::class);
  }

  public function topup()
  {
    return $this->hasMany(TopupHistory::class);
  }
  
  public function vendor()
  {
    return $this->hasMany(Vendor::class);
  }
}
