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
 * @property string $back_account_number
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
    'vendor_category_id',
    'name',
    'description',
    'picture',
    'email',
    'back_account_number',
    'website',
    'address',
    'phone'
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
    'picture' => 'string',
    'email' => 'string',
    'back_account_number' => 'string',
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
    'picture' => 'nullable|file',
    'email' => 'nullable|string|max:255',
    'back_account_number' => 'nullable|string|max:255',
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
}
