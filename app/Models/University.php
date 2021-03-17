<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class University
 * @package App\Models
 * @version March 3, 2021, 5:01 pm WIB
 *
 * @property integer $country_id
 * @property integer $state_id
 * @property integer $district_id
 * @property string $name
 * @property string $description
 * @property string $logo_src
 * @property string $type
 * @property string $accreditation
 * @property string $address
 */
class University extends Model
{
    use SoftDeletes;

    public $table = 'universities';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'country_id',
        'state_id',
        'district_id',
        'name',
        'description',
        'logo_src',
        'type',
        'accreditation',
        'address'
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
        'logo_src' => 'string',
        'type' => 'string',
        'accreditation' => 'string',
        'address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'nullable|integer',
        'state_id' => 'nullable|integer',
        'district_id' => 'nullable|integer',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'logo_src' => 'nullable|string|max:200',
        'type' => 'required|string|max:255',
        'accreditation' => 'required|string|max:255',
        'address' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }


}
