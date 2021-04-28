<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vendor
 * @package App\Models
 * @version March 3, 2021, 11:36 pm WIB
 *
 * @property integer $vendor_category_id
 * @property string $name
 * @property string $description
 * @property string $picture
 * @property string $email
 * @property string $bank_account_number
 * @property string $website
 * @property string $address
 * @property string $phone
 */
class Vendor extends Model
{
  use SoftDeletes;

  public $table = 'vendors';

  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';

  protected $dates = ['deleted_at'];

  public $fillable = [
    'country_id',
    'state_id',
    'district_id',
    'vendor_category_id',
    'name',
    'description',
    'email',
    'bank_account_number',
    'website',
    'address',
    'phone',
    'logo_src',
    'header_src'
  ];

  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'vendor_category_id' => 'integer',
    'name' => 'string',
    'description' => 'string',
    'logo_src' => 'string',
    'header_src' => 'string',
    'email' => 'string',
    'bank_account_number' => 'string',
    'website' => 'string',
    'address' => 'string',
    'phone' => 'string'
  ];

  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
    'vendor_category_id' => 'required|integer',
    'name' => 'required|string|max:50',
    'description' => 'nullable|string',
    'logo_src' => 'nullable|file',
    'header_src' => 'nullable|file',
    'email' => 'nullable|string|max:255',
    'bank_account_number' => 'nullable|string|max:255',
    'website' => 'nullable|string|max:255',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable',
    'address' => 'nullable|string|max:255',
    'phone' => 'nullable|string|max:20'
  ];

  public function vendor_category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(VendorCategory::class, 'vendor_category_id');
  }

  public function vendor_employee()
  {
    return $this->hasMany(VendorEmployee::class);
  }

  public function vendor_service()
  {
    return $this->hasMany(VendorService::class);
  }

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

  public function scopeApiSearch($query, $name, $category="", $country="", $state="", $district="")
  {
    $search = $query->when($name, function ($query) use ($name) {
      return $query->where('vendors.name', 'LIKE', "%$name%");
    })
      ->when($category, function ($query) use ($category) {
        return $query->join('vendor_categories', 'vendor_categories.id', 'vendors.vendor_category_id')
          ->where('vendor_categories.name', 'LIKE', "%$category%")
          ->orWhere('vendor_categories.id', $category);
      })
      ->when($country, function ($query) use ($country) {
        return $query->join('countries', 'countries.id', 'vendors.country_id')
          ->where('countries.id', $country);
      })
      ->when($state, function ($query) use ($state) {
        return $query->join('states', 'states.id', 'vendors.state_id')
          ->where('states.id', $state);
      })
      ->when($district, function ($query) use ($district) {
        return $query->join('districts', 'districts.id', 'vendors.district_id')
          ->where('districts.id', $district);
      });

      $select_list = ['vendors.*'];

      if (!empty($category)) {
        $select_list = array_merge($select_list, [
          'vendor_categories.id as vc_id', 
          'vendor_categories.name as vc_name', 
          'vendor_categories.description as vc_description',
          'vendor_categories.created_at as vc_created_at',
          'vendor_categories.updated_at as vc_updated_at'
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
