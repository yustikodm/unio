<?php

namespace App\Repositories;

use App\Models\PointLog;
use App\Repositories\BaseRepository;

/**
 * Class PointLogRepository
 * @package App\Repositories
 * @version April 29, 2021, 8:51 pm WIB
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
    
    public function getFamilyPoint($parentId)
    {
        return $this->model->getFamilyPoint($parentId);
    }
}
