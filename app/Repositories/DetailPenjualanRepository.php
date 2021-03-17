<?php

namespace App\Repositories;

use App\Models\DetailPenjualan;
use App\Repositories\BaseRepository;

/**
 * Class DetailPenjualanRepository
 * @package App\Repositories
 * @version October 26, 2020, 5:08 pm WIB
*/

class DetailPenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'penjualan_id',
        'barang_id',
        'catatan'
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
        return DetailPenjualan::class;
    }
}
