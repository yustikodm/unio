<?php

namespace App\Repositories;

use App\Models\KartuStokPenyesuaian;
use App\Repositories\BaseRepository;

/**
 * Class KartuStokPenyesuaianRepository
 * @package App\Repositories
 * @version October 21, 2020, 7:49 am UTC
*/

class KartuStokPenyesuaianRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'barang_id',
        'penyesuaian_id',
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
        return KartuStokPenyesuaian::class;
    }

    public function getKartuStokPenyesuaian($id){
        return KartuStokPenyesuaian::join('barang', 'barang.id', '=', 'kartu_stok_penyesuaian.barang_id')
                                    ->join('penyesuaian_stok', 'penyesuaian_stok.id', '=', 'kartu_stok_penyesuaian.penyesuaian_id')
                                    ->select('kartu_stok_penyesuaian.*', 'penyesuaian_stok.kode', 'barang.nama')
                                    ->where('kartu_stok_penyesuaian.id', $id)
                                    ->first();
    }
}
