<?php

namespace App\Repositories;

use App\Models\Kota;
use App\Repositories\BaseRepository;

/**
 * Class KotaRepository
 * @package App\Repositories
 * @version October 25, 2020, 4:05 pm WIB
*/

class KotaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Kota::class;
    }
}
