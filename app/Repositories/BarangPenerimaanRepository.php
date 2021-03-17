<?php

namespace App\Repositories;

use App\Models\BarangPenerimaan;
use App\Repositories\BaseRepository;

/**
 * Class BarangPenerimaanRepository
 * @package App\Repositories
 * @version November 23, 2020, 1:30 pm WIB
*/

class BarangPenerimaanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'penerimaan_retur_id',
        'barang_id',
        'keterangan',
        'jumlah',
        'jumlah_kurang',
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
        return BarangPenerimaan::class;
    }
}
