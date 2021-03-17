<?php

namespace App\Repositories;

use App\Models\KartuStokReturBarang;
use App\Repositories\BaseRepository;

/**
 * Class KartuStokReturBarangRepository
 * @package App\Repositories
 * @version October 21, 2020, 7:44 am UTC
*/

class KartuStokReturBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'barang_id',
        'retur_barang_id',
        'stok_awal',
        'retur',
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
        return KartuStokReturBarang::class;
    }

    public function insert($dataArray)
    {
        KartuStokReturBarang::insert($dataArray);
    }

    public function getKartuStokRetur($id){
        return KartuStokReturBarang::join('barang', 'barang.id', '=', 'kartu_stok_retur_barang.barang_id')
                                    ->join('retur_barang', 'retur_barang.id', '=', 'kartu_stok_retur_barang.retur_barang_id')
                                    ->select('kartu_stok_retur_barang.*', 'retur_barang.kode', 'barang.nama')
                                    ->where('kartu_stok_retur_barang.id', $id)
                                    ->first();
    }
}
