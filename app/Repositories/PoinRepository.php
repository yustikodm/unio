<?php

namespace App\Repositories;

use App\Models\Poin;
use App\Repositories\BaseRepository;

/**
 * Class PoinRepository
 * @package App\Repositories
 * @version October 22, 2020, 4:10 pm WIB
*/

class PoinRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mitra_id',
        'poin'
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
        return Poin::class;
    }

    public function getPoinByMitrId($id)
    {
        return Poin::join('mitra', 'mitra.id', '=', 'poin.mitra_id')                    
                    ->select('poin.*')
                    ->where('mitra.user_id', $id)                    
                    ->first();
    }
}
