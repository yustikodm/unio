<?php

namespace App\Repositories;

use App\Models\ReturBarang;
use App\Repositories\BaseRepository;

/**
 * Class ReturBarangRepository
 * @package App\Repositories
 * @version October 21, 2020, 5:47 am UTC
*/

class ReturBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'pegawai_id',
        'supplier_id',
        'keterangan',
        'tanggal'
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
        return ReturBarang::class;
    }
}
