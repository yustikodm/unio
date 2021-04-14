<?php

namespace App\Repositories;

use App\Models\UniversityFacility;
use App\Repositories\BaseRepository;

/**
 * Class UniversityFacilityRepository
 * @package App\Repositories
 * @version April 14, 2021, 3:47 pm WIB
*/

class UniversityFacilityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = ['university_id', 'name', 'description', 'amount'];

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
        return UniversityFacility::class;
    }
}
