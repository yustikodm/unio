<?php

namespace App\Repositories;

use App\Models\Jabatan;
use App\Repositories\BaseRepository;

/**
 * Class JabatanRepository
 * @package App\Repositories
 * @version November 1, 2020, 12:01 pm WIB
*/

class JabatanRepository extends BaseRepository
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
        return Jabatan::class;
    }
}
