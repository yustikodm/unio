<?php

namespace App\Repositories;

use App\Models\UniversityRequirement;
use App\Repositories\BaseRepository;

/**
 * Class UniversityRequirementRepository
 * @package App\Repositories
 * @version March 3, 2021, 5:03 pm WIB
*/

class UniversityRequirementRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'university_id',
        'major_id',
        'name',
        'value',
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
        return UniversityRequirement::class;
    }
}
