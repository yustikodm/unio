<?php

namespace App\Repositories;

use App\Models\PointTopup;
use App\Repositories\BaseRepository;

/**
 * Class PointTopupRepository
 * @package App\Repositories
 * @version March 31, 2021, 11:03 am WIB
*/

class PointTopupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return PointTopup::class;
    }
}
