<?php

namespace App\Repositories;

use App\Models\TopupHistory;
use App\Repositories\BaseRepository;

/**
 * Class TopupHistoryRepository
 * @package App\Repositories
 * @version April 29, 2021, 9:23 pm WIB
*/

class TopupHistoryRepository extends BaseRepository
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
        return TopupHistory::class;
    }
}