<?php

namespace App\Repositories;

use App\Models\Bonus;
use App\Repositories\BaseRepository;

/**
 * Class BonusRepository
 * @package App\Repositories
 * @version December 4, 2020, 9:48 pm WIB
*/

class BonusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mitra_id',
        'bonus'
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
        return Bonus::class;
    }

    public function getBonusByMitrId($id)
    {
        return Bonus::join('mitra', 'mitra.id', '=', 'bonus.mitra_id')                    
                    ->select('bonus.*')
                    ->where('mitra.user_id', $id)                    
                    ->first();
    }
}
