<?php

namespace App\Repositories;

use App\Models\TerimaBarang;
use App\Repositories\BaseRepository;

/**
 * Class TerimaBarangRepository
 * @package App\Repositories
 * @version October 21, 2020, 5:42 am UTC
*/

class TerimaBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'purchase_order_id',
        'kirim_barang_id',
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
        return TerimaBarang::class;
    }
}
