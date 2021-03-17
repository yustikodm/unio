<?php

namespace App\Repositories;

use App\Models\PenerimaanRetur;
use App\Repositories\BaseRepository;

/**
 * Class PenerimaanReturRepository
 * @package App\Repositories
 * @version November 22, 2020, 4:59 pm WIB
*/

class PenerimaanReturRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'retur_barang_id',
        'pegawai_id',
        'supplier_id',
        'keterangan',
        'tanggal',
        'status'
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
        return PenerimaanRetur::class;
    }
}
