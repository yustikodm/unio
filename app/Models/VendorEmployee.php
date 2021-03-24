<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class VendorEmployee
 * @package App\Models
 * @version March 3, 2021, 11:38 pm WIB
 *
 * @property integer $vendor_id
 * @property string $name
 * @property string $birthdate
 * @property string $position
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property string $picture
 * @property string $description
 */
class VendorEmployee extends Model
{
    use SoftDeletes;

    public $table = 'vendor_employees';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'vendor_id',
        'name',
        'birthdate',
        'position',
        'phone',
        'email',
        'address',
        'picture',
        'description'
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
        'birthdate' => 'date',
        'position' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'address' => 'string',
        'picture' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'vendor_id' => 'required|integer',
        'name' => 'nullable|string|max:255',
        'birthdate' => 'nullable',
        'position' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:255',
        'email' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'picture' => 'nullable|string|max:255',
        'description' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

}
