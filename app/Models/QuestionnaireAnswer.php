<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class QuestionnaireAnswer
 * @package App\Models
 * @version March 3, 2021, 4:48 pm WIB
 *
 * @property integer $questionairre_id
 * @property integer $user_id
 * @property string $answer
 */
class QuestionnaireAnswer extends Model
{
    use SoftDeletes;

    public $table = 'questionnaire_answers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'questionairre_id',
        'user_id',
        'answer'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'questionairre_id' => 'integer',
        'user_id' => 'integer',
        'answer' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'questionairre_id' => 'required|integer',
        'user_id' => 'required|integer',
        'answer' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
