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

  public $fillable = ['name'];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'name' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'name' => 'required|string|max:255',
  ];

  public function state()
  {
    return $this->hasMany(State::class);
  }

  public function boarding_house()
  {
    return $this->hasMany(BoardingHouse::class);
  }

  public function university()
  {
    return $this->hasMany(University::class);
  }

  public function topup()
  {
    return $this->hasMany(PointTopup::class);
  }

  public function scopeApiSearch($query, $param)
  {
    return $query->when($param, function ($query) use ($param) {
      return $query->where('name', 'LIKE', "%$param%");
    })->get();
  }
}
