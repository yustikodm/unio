<?php

namespace App\Repositories;

use App\Models\LogKlaimBonus;
use App\Repositories\BaseRepository;

/**
 * Class LogKlaimBonusRepository
 * @package App\Repositories
 * @version December 11, 2020, 4:05 pm WIB
*/

class LogKlaimBonusRepository extends BaseRepository
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
        return LogKlaimBonus::class;
    }
}
