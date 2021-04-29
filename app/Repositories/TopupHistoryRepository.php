<?php

namespace App\Repositories;

use App\Models\TopupHistory;
use App\Repositories\BaseRepository;

/**
 * Class TopupHistoryRepository
 * @package App\Repositories
 * @version March 31, 2021, 11:03 am WIB
 */

class TopupHistoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'country_id',
        'package_id',
        'code',
        'amount',
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
        return TopupHistory::class;
    }
}
