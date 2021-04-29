<?php

namespace App\Repositories;

use App\Models\Family;
use App\Repositories\BaseRepository;

/**
 * Class FamilyRepository
 * @package App\Repositories
 * @version March 31, 2021, 10:35 am WIB
*/

class FamilyRepository extends BaseRepository
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
        return Family::class;
    }

    public function getFamilyList($parentId)
    {
        return $this->model->getFamilyList($parentId);
    }

    public function getByUserId($userId)
    {
        return $this->model->getByUserId($userId);
    }
    
}
