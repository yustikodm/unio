<?php

namespace App\Repositories;

use App\Models\MasterMajor;
use App\Repositories\BaseRepository;

/**
 * Class MasterMajorRepository
 * @package App\Repositories
 * @version April 16, 2021, 11:13 am WIB
*/

class MasterMajorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return MasterMajor::class;
    }
}
