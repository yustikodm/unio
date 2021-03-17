<?php

namespace App\Repositories;

use App\Models\RekapStok;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
/**
 * Class RekapStokRepository
 * @package App\Repositories
 * @version November 30, 2020, 7:34 pm WIB
*/

class RekapStokRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'barang_id',
        'stok_awal',
        'masuk',
        'keluar',
        'stok_akhir'
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
        return RekapStok::class;
    }

    public function get($from, $to){
        $data = RekapStok::join('barang', 'rekap_stok.barang_id', '=', 'barang.id')
                          ->select('barang.nama', 'barang_id')
                          ->selectRaw('sum(rekap_stok.masuk) as masuk, sum(rekap_stok.keluar) as keluar')
                          ->whereBetween('rekap_stok.created_at', [ $from." 00:00:00", $to." 23:59:59" ])
                          ->groupby('barang.nama', 'barang_id')
                          ->get();
        $no = 1;                          
        foreach($data as $index => $row){
            $stok_awal = RekapStok::where('barang_id', $row->barang_id)
                                  ->whereBetween('rekap_stok.created_at', [ $from." 00:00:00", $to." 23:59:59" ])
                                  ->orderBy('id', 'asc')
                                  ->first();
            $object = (object)null;
            $object->id = $no++;
            $object->barang = $row->nama;
            $object->barang_id = $row->barang_id;
            $object->stok_awal = $stok_awal->stok_awal;
            $object->masuk = $row->masuk;
            $object->keluar = $row->keluar;
            $object->stok_akhir = $stok_awal->stok_awal + $row->masuk - $row->keluar;
            $object->created_at = $stok_awal->created_at;
            $object->updated_at = $stok_awal->updated_at;
            $object->deleted_at = $stok_awal->deleted_at;
            $data[$index] = $object;
        }
        return $data;
    }
}
