<?php

namespace App\Repositories;

use App\Models\Stok;
use App\Repositories\BaseRepository;

/**
 * Class StokRepository
 * @package App\Repositories
 * @version October 21, 2020, 6:11 am UTC
*/

class StokRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'barang_id',
        'stok'
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
        return Stok::class;
    }

    public function getStok($id){
        return Stok::join('barang', 'barang.id', '=', 'stok.barang_id')
                    ->select('barang.nama as barang', 'stok.*')
                    ->where('stok.id', $id)
                    ->first();
    }
}
