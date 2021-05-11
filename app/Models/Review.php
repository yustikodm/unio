<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Review
 * @package App\Models
 * @version May 11, 2021, 6:17 pm WIB
 *
 * @property integer $user_id
 * @property integer $entity_id
 * @property string $entity_name
 * @property string $message
 * @property integer $rating
 */
class Review extends Model
{
    use SoftDeletes;

    public $table = 'review';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'entity_id',
        'entity_name',
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
        'user_id' => 'integer',
        'entity_id' => 'integer',
        'entity_name' => 'string',
        'message' => 'string',
        'rating' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'entity_id' => 'required',
        'entity_name' => 'required',
        'message' => 'required',
        'rating' => 'required'
    ];

    
}
