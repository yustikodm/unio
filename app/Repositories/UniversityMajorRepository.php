<?php

namespace App\Repositories;

use App\Models\UniversityMajor;
use App\Repositories\BaseRepository;

/**
 * Class UniversityMajorRepository
 * @package App\Repositories
 * @version March 3, 2021, 5:02 pm WIB
*/

class UniversityMajorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'university_id',
        'faculty_id',
        'name',
        'description',
        'accreditation',
        'temp'
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
        return UniversityMajor::class;
    }
}
