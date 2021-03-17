<?php

namespace App\Repositories;

use App\Models\KirimBarang;
use App\Repositories\BaseRepository;

/**
 * Class KirimBarangRepository
 * @package App\Repositories
 * @version October 21, 2020, 5:38 am UTC
*/

class KirimBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'purchase_order_id',
        'kode',
        'pegawai_id',
        'supplier_id',
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
        return KirimBarang::class;
    }
}
