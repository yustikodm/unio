<?php

namespace App\Repositories;

use App\Models\TopupPackage;
use App\Repositories\BaseRepository;

/**
 * Class TopupPackageRepository
 * @package App\Repositories
 * @version April 29, 2021, 9:28 pm WIB
*/

class TopupPackageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'description',
        'amount',
        'due_date',
        'status'
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
        return TopupPackage::class;
    }
}
