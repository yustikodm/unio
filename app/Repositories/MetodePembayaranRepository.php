<?php

namespace App\Repositories;

use App\Models\MetodePembayaran;
use App\Repositories\BaseRepository;

/**
 * Class MetodePembayaranRepository
 * @package App\Repositories
 * @version November 23, 2020, 10:16 pm WIB
*/

class MetodePembayaranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return MetodePembayaran::class;
    }
}
