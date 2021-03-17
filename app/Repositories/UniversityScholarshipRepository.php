<?php

namespace App\Repositories;

use App\Models\UniversityScholarship;
use App\Repositories\BaseRepository;

/**
 * Class UniversityScholarshipRepository
 * @package App\Repositories
 * @version March 3, 2021, 5:03 pm WIB
*/

class UniversityScholarshipRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'university_id',
        'description',
        'picture',
        'year'
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
        return UniversityScholarship::class;
    }
}
