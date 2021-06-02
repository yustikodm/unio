<?php

namespace App\Repositories;

use App\Models\LevelMajor;
use App\Repositories\BaseRepository;

/**
 * Class LevelMajorRepository
 * @package App\Repositories
 * @version May 31, 2021, 5:07 pm WIB
*/

class LevelMajorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
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
        return LevelMajor::class;
    }
}
