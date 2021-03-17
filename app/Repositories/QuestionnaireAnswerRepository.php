<?php

namespace App\Repositories;

use App\Models\QuestionnaireAnswer;
use App\Repositories\BaseRepository;

/**
 * Class QuestionnaireAnswerRepository
 * @package App\Repositories
 * @version March 3, 2021, 4:48 pm WIB
*/

class QuestionnaireAnswerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'questionairre_id',
        'user_id',
        'answer'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return QuestionnaireAnswer::class;
    }
}
