<?php

namespace App\Repositories;

use App\Models\PointLog;
use App\Repositories\BaseRepository;

/**
 * Class PointLogRepository
 * @package App\Repositories
 * @version March 31, 2021, 11:04 am WIB
*/

class PointLogRepository extends BaseRepository
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
        return PointLog::class;
    }

    public function getPointData($parentId)
    {
        return $this->model->getPointData($parentId);
    }
}
