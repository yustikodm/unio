<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Guardian
 * @package App\Models
 * @version March 3, 2021, 11:44 pm WIB
 *
 * @property integer $user_id
 * @property integer $guardian_id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $picture
 * @property string $birth_date
 * @property string $birth_place
 * @property string $email
 * @property string $nik
 * @property integer $religion_id
 * @property string $address
 * @property string $phone
 */
class Guardian extends Model
{
    use SoftDeletes;

    public $table = 'guardians';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'guardian_id',
        'username',
        'password',
        'name',
        'picture',
        'birth_date',
        'birth_place',
        'email',
        'nik',
        'religion_id',
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
        'user_id' => 'integer',
        'guardian_id' => 'integer',
        'username' => 'string',
        'password' => 'string',
        'name' => 'string',
        'picture' => 'string',
        'birth_date' => 'date',
        'birth_place' => 'string',
        'email' => 'string',
        'nik' => 'string',
        'religion_id' => 'integer',
        'address' => 'string',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'nullable|integer',
        'guardian_id' => 'nullable|integer',
        'username' => 'required|string|max:255',
        'password' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'picture' => 'required|string',
        'birth_date' => 'required',
        'birth_place' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'nik' => 'required|string|max:255',
        'religion_id' => 'required|integer',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];


}
