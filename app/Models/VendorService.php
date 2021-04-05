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
    'name' => 'required|string|max:255',
    'description' => 'nullable|string',
    'picture' => 'string',
    'price' => 'required',
    'created_at' => 'nullable',
    'updated_at' => 'nullable',
    'deleted_at' => 'nullable'
  ];

  public function vendor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(Vendor::class, 'vendor_id');
  }

  public function wishlist()
  {
    return $this->hasMany(Wishlist::class);
  }

  public function scopeApiSearch($query, $param)
  {
    return $query->when($param, function ($query) use ($param) {
      return $query->where('name', 'LIKE', "%$param%");
    })->get();
  }
}
