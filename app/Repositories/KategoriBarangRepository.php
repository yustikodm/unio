<?php

namespace App\Repositories;

use App\Models\KategoriBarang;
use App\Repositories\BaseRepository;

/**
 * Class KategoriBarangRepository
 * @package App\Repositories
 * @version October 20, 2020, 8:01 am UTC
*/

class KategoriBarangRepository extends BaseRepository
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
        return KategoriBarang::class;
    }
}
