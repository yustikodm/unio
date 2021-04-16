<?php

namespace App\Repositories;

use App\Models\PointTransaction;
use App\Repositories\BaseRepository;

/**
 * Class PointTransactionRepository
 * @package App\Repositories
 * @version March 31, 2021, 10:59 am WIB
*/

class PointTransactionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'entity_id',
        'entity_type',
        'amount',
        'point_conversion',
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
        return PointTransaction::class;
    }
}
