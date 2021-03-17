<?php

namespace App\Repositories;

use App\Models\BarangKirim;
use App\Repositories\BaseRepository;

/**
 * Class BarangKirimRepository
 * @package App\Repositories
 * @version November 3, 2020, 11:50 am WIB
*/

class BarangKirimRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kirim_barang_id',
        'barang_id',
        'jumlah',
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
        return BarangKirim::class;
    }
}
