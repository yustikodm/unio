<?php

namespace App\Repositories;

use App\Models\ReviewMajors;
use App\Repositories\BaseRepository;

/**
 * Class ReviewMajorsRepository
 * @package App\Repositories
 * @version May 18, 2021, 1:56 am WIB
*/

class ReviewMajorsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'majors_id',
        'user_id',
        'message',
        'rating'
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
        return ReviewMajors::class;
    }
}
