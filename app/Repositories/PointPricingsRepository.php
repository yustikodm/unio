<?php

namespace App\Repositories;

use App\Models\PointPricings;
use App\Repositories\BaseRepository;

/**
 * Class PointPricingsRepository
 * @package App\Repositories
 * @version April 15, 2021, 2:02 pm WIB
*/

class PointPricingsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'entity_id',
        'entity_type',
        'amount'
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
        return PointPricings::class;
    }

    public function findBy(Array $arr=[])
    {
        return PointPricings::where($arr)->orderBy('id', 'desc')->first();
    }
}
