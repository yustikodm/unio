<?php

namespace App\Repositories;

use App\Models\UniversityFaculties;
use App\Repositories\BaseRepository;

/**
 * Class UniversityFacultiesRepository
 * @package App\Repositories
 * @version March 3, 2021, 5:08 pm WIB
*/

class UniversityFacultiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'university_id',
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
        return UniversityFaculties::class;
    }
}
