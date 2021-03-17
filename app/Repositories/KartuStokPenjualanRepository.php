<?php

namespace App\Repositories;

use App\Models\KartuStokPenjualan;
use App\Repositories\BaseRepository;

/**
 * Class KartuStokPenjualanRepository
 * @package App\Repositories
 * @version October 21, 2020, 7:30 am UTC
*/

class KartuStokPenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'barang_id',
        'penjualan_id',
        'stok_awal',
        'masuk',
        'keluar',
        'stok_akhir',
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
        return KartuStokPenjualan::class;
    }

    public function insertBatch($dataArray){       
        KartuStokPenjualan::insert($dataArray); 
    }
}
