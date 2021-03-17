<?php

namespace App\Repositories;

use App\Models\KartuStokTerimaBarang;
use App\Repositories\BaseRepository;

/**
 * Class KartuStokTerimaBarangRepository
 * @package App\Repositories
 * @version October 21, 2020, 7:33 am UTC
*/

class KartuStokTerimaBarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'barang_id',
        'terima_barang_id',
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
        return KartuStokTerimaBarang::class;
    }

    public function insert($dataArray){
        KartuStokTerimaBarang::insert($dataArray);
    }    

    public function getKartuStokTerima($id){
        return KartuStokTerimaBarang::join('barang', 'barang.id', '=', 'kartu_stok_terima_barang.barang_id')
                                    ->join('terima_barang', 'terima_barang.id', '=', 'kartu_stok_terima_barang.terima_barang_id')
                                    ->select('kartu_stok_terima_barang.*', 'terima_barang.kode', 'barang.nama')
                                    ->where('kartu_stok_terima_barang.id', $id)
                                    ->first();
    }
}
