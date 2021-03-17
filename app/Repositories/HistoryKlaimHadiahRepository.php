<?php

namespace App\Repositories;

use App\Models\HistoryKlaimHadiah;
use App\Repositories\BaseRepository;

/**
 * Class HistoryKlaimHadiahRepository
 * @package App\Repositories
 * @version November 25, 2020, 2:58 pm WIB
*/

class HistoryKlaimHadiahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'hadiah_id',
        'mitra_id',
        'keterangan',
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
        return HistoryKlaimHadiah::class;
    }

    public function get()
    {
        return HistoryKlaimHadiah::join("mitra", "mitra.id", "=", "history_klaim_hadiah.mitra_id")
                                 ->join('hadiah', 'hadiah.id', '=', 'history_klaim_hadiah.hadiah_id')
                                 ->join('poin', 'poin.mitra_id', '=', 'mitra.id')
                                 ->join('pelanggan', 'pelanggan.id', '=', 'mitra.pelanggan_id')
                                 ->join('barang', 'barang.id','=', 'hadiah.barang_id')
                                 ->select("hadiah.poin as poin_hadiah","hadiah.stok", "barang.nama as nama_barang", "pelanggan.nama as nama_mitra", 'history_klaim_hadiah.*', 'poin.poin as poin_mitra')
                                 ->orderBy("history_klaim_hadiah.id", "DESC")
                                 ->get();
    }
}
