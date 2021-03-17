<?php

namespace App\Repositories;

use App\Models\TipeParameter;
use App\Repositories\BaseRepository;

/**
 * Class TipeParameterRepository
 * @package App\Repositories
 * @version November 24, 2020, 1:50 pm WIB
*/

class TipeParameterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'nama'
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
        return TipeParameter::class;
    }
}
