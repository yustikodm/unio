<?php

namespace App\Repositories;

use App\Models\Harga;
use App\Repositories\BaseRepository;

/**
 * Class HargaRepository
 * @package App\Repositories
 * @version October 21, 2020, 6:05 am UTC
*/

class HargaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'barang_id',
        'harga'
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
        return Harga::class;
    }

    public function getHarga($id){
        return Harga::join('barang', 'barang.id', '=', 'harga.barang_id')
                    ->select('barang.nama as barang', 'harga.*')
                    ->where('harga.id', $id)
                    ->first();
    }
}
