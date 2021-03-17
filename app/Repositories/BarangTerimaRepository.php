<?php

namespace App\Repositories;

use App\Models\BarangTerima;
use App\Repositories\BaseRepository;

/**
 * Class BarangTerimaRepository
 * @package App\Repositories
 * @version November 3, 2020, 12:23 pm WIB
*/

class BarangTerimaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'terima_barang_id',
        'barang_id',
        'jumlah',
        'jumlah_kurang',
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
        return BarangTerima::class;
    }

    public function where($fieldName, $kondisi, $value)
    {
        return BarangTerima::where($fieldName, $kondisi, $value)->get();
    }
}
