<?php

namespace App\Repositories;

use App\Models\Biodata;
use App\Repositories\BaseRepository;

/**
 * Class BiodataRepository
 * @package App\Repositories
 * @version March 31, 2021, 10:43 am WIB
*/

class BiodataRepository extends BaseRepository
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
        return Biodata::class;
    }

    public function findByUser($user_id)
    {
        return Biodata::where('user_id', $user_id)
                    ->select('id', 'user_id', 'fullname')
                    ->first();
    }

    public function firstOrCreate(array $param, array $fields)
    {
        return $this->model->firstOrCreate($param, $fields);
    }
}
