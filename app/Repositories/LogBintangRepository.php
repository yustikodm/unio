<?php

namespace App\Repositories;

use App\Models\LogBintang;
use App\Repositories\BaseRepository;

/**
 * Class LogBintangRepository
 * @package App\Repositories
 * @version November 9, 2020, 11:42 pm WIB
*/

class LogBintangRepository extends BaseRepository
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
        return LogBintang::class;
    }
}
