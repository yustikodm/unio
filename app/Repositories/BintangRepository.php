<?php

namespace App\Repositories;

use App\Models\Bintang;
use App\Repositories\BaseRepository;

/**
 * Class BintangRepository
 * @package App\Repositories
 * @version October 22, 2020, 5:42 pm WIB
*/

class BintangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mitra_id',
        'bintang'
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
        return Bintang::class;
    }
}
