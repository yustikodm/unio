<?php

namespace App\Repositories;

use App\Models\BarangPenjualan;
use App\Repositories\BaseRepository;

/**
 * Class BarangPenjualanRepository
 * @package App\Repositories
 * @version November 3, 2020, 10:26 pm WIB
*/

class BarangPenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'penjualan_id',
        'barang_id',
        'harga',
        'jumlah',
        'subtotal'
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
        return BarangPenjualan::class;
    }
}
