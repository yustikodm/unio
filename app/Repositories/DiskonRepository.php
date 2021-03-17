<?php

namespace App\Repositories;

use App\Models\Diskon;
use App\Repositories\BaseRepository;

/**
 * Class DiskonRepository
 * @package App\Repositories
 * @version November 23, 2020, 9:53 pm WIB
*/

class DiskonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'barang_id',
        'diskon'
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
        return Diskon::class;
    }

    public function getDiskon($id){
        return Diskon::join('barang', 'barang.id', '=', 'diskon.barang_id')
                    ->select('barang.nama as barang', 'diskon.*')
                    ->where('diskon.id', $id)
                    ->first();
    }
}
