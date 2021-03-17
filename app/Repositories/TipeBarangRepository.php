<?php

namespace App\Repositories;

use App\Models\TipeBarang;
use App\Repositories\BaseRepository;

/**
 * Class TipeBarangRepository
 * @package App\Repositories
 * @version November 24, 2020, 1:52 pm WIB
*/

class TipeBarangRepository extends BaseRepository
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
        return TipeBarang::class;
    }
}
