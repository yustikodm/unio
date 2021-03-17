<?php

namespace App\Repositories;

use App\Models\Mitra;
use App\Repositories\BaseRepository;

/**
 * Class MitraRepository
 * @package App\Repositories
 * @version October 20, 2020, 8:17 am UTC
*/

class MitraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'pelanggan_id',
        'jenis',
        'tanggal_mulai',
        'tanggal_akhir',
        'user_id',
        'referral_id'
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
        return Mitra::class;
    }

    public function getMitra($id)
    {
        return Mitra::join('pelanggan', 'pelanggan.id', '=', 'mitra.pelanggan_id')
                    ->join('level_mitra', 'level_mitra.id', '=', 'mitra.level_mitra_id')
                    ->leftJoin('mitra as mitra_referral', 'mitra_referral.id', '=', 'mitra.referral_id')
                    ->leftJoin('pelanggan as referral', 'referral.id', '=', 'mitra_referral.pelanggan_id')
                    ->select('pelanggan.nama', 'referral.nama as referral_nama','pelanggan.kode as pelanggan_kode', 'level_mitra.nama as level', 'mitra.*')
                    ->where('mitra.id', $id)
                    ->first();
    }
}
