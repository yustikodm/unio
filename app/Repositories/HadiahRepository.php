<?php

namespace App\Repositories;

use App\Models\Hadiah;
use App\Repositories\BaseRepository;

/**
 * Class HadiahRepository
 * @package App\Repositories
 * @version November 23, 2020, 9:21 pm WIB
*/

class HadiahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'barang_id',
        'poin',
        'stok',
        'status',
        'tanggal_kadaluarsa'
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
        return Hadiah::class;
    }

    public function get(){
        $date = date('Y-m-d');

        return Hadiah::join("barang", 'barang.id', '=', 'hadiah.barang_id')
                    ->select('barang.nama as nama_barang', 'hadiah.*')
                    ->where('hadiah.status', 'Aktif')
                    ->where('hadiah.tanggal_kadaluarsa', '>=', $date)
                    ->where('hadiah.poin', '!=', '0')
                    ->where('hadiah.stok', '!=', '0')
                    ->get();
    }

    public function getHadiah($id){
        return Hadiah::join('barang', 'barang.id', '=', 'hadiah.barang_id')
                    ->select('barang.nama as barang', 'hadiah.*')
                    ->where('hadiah.id', $id)
                    ->first();
    }
}
