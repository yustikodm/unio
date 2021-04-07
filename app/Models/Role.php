<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Class Role
 * @package App\Models
 * @version October 19, 2020, 3:05 pm UTC
 *
 * @property \App\Models\ModelHasRole $modelHasRole
 * @property \Illuminate\Database\Eloquent\Collection $permissions
 * @property string $name
 * @property string $guard_name
 */
class Role extends SpatieRole
{

  public $table = 'roles';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  public $fillable = [
    'name',
    'guard_name'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'name' => 'string',
    'guard_name' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'name' => 'required|string|max:255',
    'guard_name' => 'required|string|max:255',
    'created_at' => 'nullable',
    'updated_at' => 'nullable'
  ];

}
