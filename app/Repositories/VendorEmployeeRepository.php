<?php

namespace App\Repositories;

use App\Models\VendorEmployee;
use App\Repositories\BaseRepository;

/**
 * Class VendorEmployeeRepository
 * @package App\Repositories
 * @version March 3, 2021, 11:38 pm WIB
*/

class VendorEmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'vendor_id',
        'name',
        'birthdate',
        'position',
        'phone',
        'email',
        'address',
        'picture',
        'description'
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
        return VendorEmployee::class;
    }
}
