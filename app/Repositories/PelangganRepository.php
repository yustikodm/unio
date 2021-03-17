<?php

namespace App\Repositories;

use App\Models\Pelanggan;
use App\Repositories\BaseRepository;

/**
 * Class PelangganRepository
 * @package App\Repositories
 * @version October 20, 2020, 7:29 am UTC
*/

class PelangganRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'nomor_ktp',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'pekerjaan',
        'kota',
        'alamat',
        'telepon',
        'hp',
        'tanggal_daftar'
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
        return Pelanggan::class;
    }

    public function getPelanggan($id){
        return Pelanggan::join('kota', 'kota.id', '=', 'pelanggan.kota_id')
                        ->join('pekerjaan', 'pekerjaan.id', '=', 'pelanggan.pekerjaan_id')
                        ->select('pekerjaan.nama as pekerjaan', 'kota.nama as kota', 'pelanggan.*')
                        ->where('pelanggan.id', $id)
                        ->first();
    }
}
