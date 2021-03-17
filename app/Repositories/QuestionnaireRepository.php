<?php

namespace App\Repositories;

use App\Models\Questionnaire;
use App\Repositories\BaseRepository;

/**
 * Class QuestionnaireRepository
 * @package App\Repositories
 * @version March 3, 2021, 4:48 pm WIB
*/

class QuestionnaireRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'question',
        'type',
        'answer_choice'
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
        return Questionnaire::class;
    }
}
