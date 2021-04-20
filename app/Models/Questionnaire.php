<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Questionnaire
 * @package App\Models
 * @version March 3, 2021, 4:48 pm WIB
 *
 * @property string $question
 * @property string $type
 * @property string $answer_choice
 */
class Questionnaire extends Model
{
    use SoftDeletes;

    public $table = 'questionnaires';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'question',
        'type',
        'answer_choice'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'question' => 'string',
        'type' => 'string',
        'answer_choice' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'question' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'answer_choice' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function questionnare_answer()
    {
        return $this->hasMany(QuestionnaireAnswer::class);
    }
}
