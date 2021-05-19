<?php

namespace App\Repositories;

use App\Models\MajorPrediction;
use App\Repositories\BaseRepository;

/**
 * Class MajorPredictionRepository
 * @package App\Repositories
 * @version May 17, 2021, 8:11 pm WIB
*/

class MajorPredictionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'major_id',
        'major_name',
        'fos',
        'man_check'
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
        return MajorPrediction::class;
    }
}
