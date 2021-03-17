<?php

namespace App\Repositories;

use App\Models\SatuanBarang;
use App\Repositories\BaseRepository;

/**
 * Class SatuanBarangRepository
 * @package App\Repositories
 * @version October 20, 2020, 8:00 am UTC
*/

class SatuanBarangRepository extends BaseRepository
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
        return SatuanBarang::class;
    }
}
