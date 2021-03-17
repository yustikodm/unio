<?php

namespace App\Repositories;

use App\Models\BarangPenyesuaian;
use App\Repositories\BaseRepository;

/**
 * Class BarangPenyesuaianRepository
 * @package App\Repositories
 * @version November 22, 2020, 7:23 pm WIB
*/

class BarangPenyesuaianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'penyesuaian_stok_id',
        'barang_id',
        'stok_database',
        'stok_lapangan',
        'tipe',        
        'jumlah'
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
        return BarangPenyesuaian::class;
    }

    public function getBarangPenyesuaian($id){
        return BarangPenyesuaian::join('barang', 'barang.id', '=', 'barang_penyesuaian.barang_id')
                                ->select('barang.nama as nama_barang', 'barang_penyesuaian.*')
                                ->where('barang_penyesuaian.penyesuaian_stok_id', $id)
                                ->get();
    }
}
