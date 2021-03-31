<?php

namespace App\Repositories;

use App\Models\PricingPoint;
use App\Repositories\BaseRepository;

/**
 * Class PricingPointRepository
 * @package App\Repositories
 * @version March 31, 2021, 10:52 am WIB
*/

class PricingPointRepository extends BaseRepository
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
        return PricingPoint::class;
    }
}
