<?php

namespace App\Repositories;

use App\Models\LogPoin;
use App\Repositories\BaseRepository;

/**
 * Class LogPoinRepository
 * @package App\Repositories
 * @version November 9, 2020, 11:37 pm WIB
*/

class LogPoinRepository extends BaseRepository
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
        return LogPoin::class;
    }
}
