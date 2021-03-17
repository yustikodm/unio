<?php

namespace App\Repositories;

use App\Models\Parameter;
use App\Repositories\BaseRepository;

/**
 * Class ParameterRepository
 * @package App\Repositories
 * @version October 21, 2020, 8:23 am UTC
*/

class ParameterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'key',
        'value'
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
        return Parameter::class;
    }
}
