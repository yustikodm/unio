<?php

namespace App\Repositories;

use App\Models\FOS;
use App\Repositories\BaseRepository;

/**
 * Class FOSRepository
 * @package App\Repositories
 * @version May 25, 2021, 9:34 pm WIB
*/

class FOSRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'cip',
        'hc'
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
        return FOS::class;
    }
}
