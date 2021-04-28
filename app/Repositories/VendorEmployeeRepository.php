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

    public function save($input, $id = null)
    {
        if (request()->hasFile('picture')) {
            $field = ['picture'];
            $path = 'employees/';

            // Helper Upload App\helper.php
            $ouput = upload($input['name'], $field, $path);

            $input = array_merge($input, $ouput);
        }

        if (!empty($id)) {
            return $this->update($input, $id);
        } else {
            return $this->create($input);
        }
    }
}
