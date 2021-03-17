<?php

namespace App\Repositories;

use App\Models\BarangRetur;
use App\Repositories\BaseRepository;

/**
 * Class BarangReturRepository
 * @package App\Repositories
 * @version November 10, 2020, 1:04 pm WIB
*/

class BarangReturRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'retur_barang_id',
        'barang_id',
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
        return BarangRetur::class;
    }

    public function getJoinBarangRetur(){
        return BarangRetur::join('barang', 'barang.id', '=', 'barang_retur.barang_id')
                          ->select('barang.nama', 'barang_retur.*')
                          ->get();  
    }
}
