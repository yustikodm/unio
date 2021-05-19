<?php

namespace App\Repositories;

use App\Models\QuestionnaireImage;
use App\Repositories\BaseRepository;

/**
 * Class QuestionnaireImageRepository
 * @package App\Repositories
 * @version May 18, 2021, 2:12 pm WIB
*/

class QuestionnaireImageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'src',
        'type'
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
        return QuestionnaireImage::class;
    }
}
