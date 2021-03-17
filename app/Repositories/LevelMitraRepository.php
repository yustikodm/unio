<?php

namespace App\Repositories;

use App\Models\LevelMitra;
use App\Repositories\BaseRepository;

/**
 * Class LevelMitraRepository
 * @package App\Repositories
 * @version October 22, 2020, 5:56 pm WIB
*/

class LevelMitraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'kode',
        'nama'
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
        return LevelMitra::class;
    }
}
