<?php

namespace App\Repositories;

use App\Models\UniversityFee;
use App\Repositories\BaseRepository;

/**
 * Class UniversityFeeRepository
 * @package App\Repositories
 * @version March 3, 2021, 5:02 pm WIB
*/

class UniversityFeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'university_id',
        'faculty_id',
        'major_id',
        'currency_id',
        'type',
        'admission_fee',
        'semester_fee',
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
        return UniversityFee::class;
    }
}
