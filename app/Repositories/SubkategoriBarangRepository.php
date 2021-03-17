<?php

namespace App\Repositories;

use App\Models\SubkategoriBarang;
use App\Repositories\BaseRepository;

/**
 * Class SubkategoriBarangRepository
 * @package App\Repositories
 * @version October 20, 2020, 8:02 am UTC
*/

class SubkategoriBarangRepository extends BaseRepository
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
        return SubkategoriBarang::class;
    }
}
