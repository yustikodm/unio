<?php

namespace App\Repositories;

use App\Models\Barang;
use App\Repositories\BaseRepository;

/**
 * Class BarangRepository
 * @package App\Repositories
 * @version October 20, 2020, 7:55 am UTC
*/

class BarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'nama',
        'satuan',
        'kategori',
        'subkategori',
        'tipe'
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

    public function getStokHarga($id) {
        return Barang::getStokHarga($id);
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Barang::class;
    }

    public function getBarang($id)
    {
        return Barang::join('satuan_barang', 'satuan_barang.id', '=', 'barang.satuan_id')
                     ->join('kategori_barang','kategori_barang.id','=', 'barang.kategori_id')    
                     ->join('subkategori_barang', 'subkategori_barang.id', '=','barang.subkategori_id')
                     ->select('satuan_barang.nama as satuan', 'kategori_barang.nama as kategori', 'subkategori_barang.nama as subkategori', 'barang.*')
                     ->where("barang.id", $id)
                     ->first();
    }
    
    public function getHarga($id) {
        return Barang::join('harga', 'harga.barang_id', '=', 'barang.id')
                     ->select("barang.*", 'harga.harga')
                     ->where('barang.id', $id)
                     ->first();
    }

    public function getStok($id) {
        return Barang::join('stok', 'stok.barang_id', '=', 'barang.id')
                     ->select("barang.*", 'stok.stok')
                     ->where('barang.id', $id)
                     ->first();
    }
}
