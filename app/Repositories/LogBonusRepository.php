<?php

namespace App\Repositories;

use App\Models\LogBonus;
use App\Repositories\BaseRepository;

/**
 * Class LogBonusRepository
 * @package App\Repositories
 * @version December 4, 2020, 10:07 pm WIB
*/

class LogBonusRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mitra_id',
        'keterangan',
        'jumlah'
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
        return LogBonus::class;
    }
}
