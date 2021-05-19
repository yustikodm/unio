<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ReviewMajors
 * @package App\Models
 * @version May 18, 2021, 1:56 am WIB
 *
 * @property integer $majors_id
 * @property integer $user_id
 * @property string $message
 * @property integer $rating
 */
class ReviewMajors extends Model
{
    use SoftDeletes;

    public $table = 'review_majors';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'majors_id',
        'user_id',
        'message',
        'rating'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'majors_id' => 'integer',
        'user_id' => 'integer',
        'message' => 'string',
        'rating' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'majors_id' => 'required',
        'user_id' => 'required',
        'message' => 'required',
        'rating' => 'required'
    ];

    
}
