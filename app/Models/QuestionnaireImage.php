<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class QuestionnaireImage
 * @package App\Models
 * @version May 18, 2021, 2:12 pm WIB
 *
 * @property string $src
 * @property string $type
 */
class QuestionnaireImage extends Model
{
    use SoftDeletes;

    public $table = 'questionnaire_image';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'src',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'src' => 'string',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'src' => 'required',
        'type' => 'required'
    ];

    
}
