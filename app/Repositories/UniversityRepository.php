<?php

namespace App\Repositories;

use App\Models\University;
use App\Repositories\BaseRepository;

/**
 * Class UniversityRepository
 * @package App\Repositories
 * @version March 3, 2021, 5:01 pm WIB
*/

class UniversityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'state_id',
        'district_id',
        'name',
        'description',
        'logo_src',
        'type',
        'accreditation',
        'address'
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
        return University::class;
    }
}
