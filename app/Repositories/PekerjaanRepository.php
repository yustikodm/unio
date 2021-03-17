<?php

namespace App\Repositories;

use App\Models\Pekerjaan;
use App\Repositories\BaseRepository;

/**
 * Class PekerjaanRepository
 * @package App\Repositories
 * @version October 25, 2020, 4:11 pm WIB
*/

class PekerjaanRepository extends BaseRepository
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
        return Pekerjaan::class;
    }
}
