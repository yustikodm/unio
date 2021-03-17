<?php

namespace App\Repositories;

use App\Models\Religion;
use App\Repositories\BaseRepository;

/**
 * Class ReligionRepository
 * @package App\Repositories
 * @version March 3, 2021, 4:46 pm WIB
*/

class ReligionRepository extends BaseRepository
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
        return Religion::class;
    }
}
