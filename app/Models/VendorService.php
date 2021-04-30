<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VendorService
 * @package App\Models
 * @version March 3, 2021, 11:37 pm WIB
 *
 * @property integer $vendor_id
 * @property string $name
 * @property string $description
 * @property string $picture
 * @property integer $price
 */
class VendorService extends Model
{
  use SoftDeletes;

  public $table = 'vendor_services';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'vendor_id',
    'name',
    'description',
    'level',
    'picture',
    'price'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'vendor_id' => 'integer',
    'name' => 'string',
    'description' => 'string',
    'level' => 'string',
    'picture' => 'string',
    'price' => 'integer'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'vendor_id' => 'required|integer',
    'name' => 'required|string',
    'description' => 'nullable|string',
    'picture' => 'nullable',
    'level' => 'string|nullable',
    'price' => 'required',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable'
  ];

  public function vendor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(Vendor::class, 'vendor_id');
  }

  public function scopeApiSearch($query, $param, $vendor, $country, $state, $district)
  {
    $search = $query->when($param, function ($query) use ($param) {
      return $query->where('vendor_services.name', 'LIKE', "%$param%");
    })
    ->when($vendor, function ($query) use ($vendor) {
      return $query->join('vendors', 'vendors.id', 'vendor_services.vendor_id')
        ->where('vendors.name', 'LIKE', "%$vendor%")
        ->orWhere('vendors.id', $vendor);
    })
    ->when($country, function ($query) use ($country) {
      return $query->join('vendors', 'vendors.id', 'vendor_services.vendor_id')
        ->join('countries', 'countries.id', 'vendors.country_id')
        ->where('countries.id', $country);
    })
    ->when($state, function ($query) use ($state) {
      return $query->join('vendors', 'vendors.id', 'vendor_services.vendor_id')
        ->join('states', 'states.id', 'vendors.state_id')
        ->where('states.id', $state);
    })
    ->when($district, function ($query) use ($district) {
      return $query->join('vendors', 'vendors.id', 'vendor_services.vendor_id')
        ->join('districts', 'districts.id', 'vendors.district_id')
        ->where('districts.id', $district);
    });

    $select_list = ['vendor_services.*'];

    if (!empty($vendor)) {
      $select_list = array_merge($select_list, [
        'vendors.id as v_id',
        'vendors.name as v_name',
        'vendors.description as v_description',
        'vendors.picture as v_picture',
        'vendors.email as v_email',
        'vendors.back_account_number as v_back_account_number',
        'vendors.website as v_website',
        'vendors.address as v_address',
        'vendors.phone as v_phone',
        'vendors.created_at as v_created_at',
        'vendors.updated_at as v_updated_at'
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
