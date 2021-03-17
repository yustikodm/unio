<?php

namespace App\Repositories;

use App\Models\Pegawai;
use App\Repositories\BaseRepository;

/**
 * Class PegawaiRepository
 * @package App\Repositories
 * @version November 1, 2020, 11:55 am WIB
*/

class PegawaiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'nama',
        'tanggal_lahir',
        'alamat',
        'telepon',
        'jabatan_id'
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
        return Pegawai::class;
    }

    public function getPegawai($id)
    {
        return Pegawai::join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
                     ->select('jabatan.nama as jabatan', 'pegawai.*')
                     ->where('pegawai.id', $id)
                     ->first();
    }

    public function getUserByUserId($id)
    {
        return Pegawai::where('user_id', $id)->first();
    }
}
