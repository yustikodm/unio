<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class District
 * @package App\Models
 * @version March 3, 2021, 4:37 pm WIB
 *
 * @property integer $state_id
 * @property string $name
 */
class District extends Model
{
  use SoftDeletes;

  public $table = 'districts';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $dates = ['deleted_at'];

  public $fillable = ['state_id', 'name'];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'state_id' => 'integer',
    'name' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'state_id' => 'required|integer',
    'name' => 'required|string|max:255',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable'
  ];


  public function state()
  {
    return $this->belongsTo(State::class, 'state_id');
  }

  public function boarding_house()
  {
    return $this->hasMany(BoardingHouse::class);
  }

  public function university()
  {
    return $this->hasMany(University::class);
  }
}
