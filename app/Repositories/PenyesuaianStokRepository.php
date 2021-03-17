<?php

namespace App\Repositories;

use App\Models\PenyesuaianStok;
use App\Repositories\BaseRepository;

/**
 * Class PenyesuaianStokRepository
 * @package App\Repositories
 * @version November 1, 2020, 3:28 pm WIB
*/

class PenyesuaianStokRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'barang_id',
        'stok_database',
        'stok_lapangan',
        'tipe',
        'jumlah',
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
        return PenyesuaianStok::class;
    }

    public function getLastestData()
    {
        return PenyesuaianStok::latest()->first();
    }
}
