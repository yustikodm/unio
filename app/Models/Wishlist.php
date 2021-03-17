<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Wishlist
 * @package App\Models
 * @version March 3, 2021, 11:44 pm WIB
 *
 * @property integer $university_id
 * @property integer $major_id
 * @property integer $service_id
 * @property integer $user_id
 * @property string $description
 */
class Wishlist extends Model
{
    use SoftDeletes;

    public $table = 'wishlists';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'university_id',
        'major_id',
        'service_id',
        'user_id',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'university_id' => 'integer',
        'major_id' => 'integer',
        'service_id' => 'integer',
        'user_id' => 'integer',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'university_id' => 'nullable|integer',
        'major_id' => 'nullable|integer',
        'service_id' => 'nullable|integer',
        'user_id' => 'required|integer',
        'description' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
