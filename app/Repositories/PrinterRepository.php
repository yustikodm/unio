<?php

namespace App\Repositories;

use App\Models\Printer;
use App\Repositories\BaseRepository;

/**
 * Class PrinterRepository
 * @package App\Repositories
 * @version December 21, 2020, 2:23 pm WIB
*/

class PrinterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'default'
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
        return Printer::class;
    }
}
