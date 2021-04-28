<?php

namespace App\Repositories;

use App\Models\Vendor;
use App\Repositories\BaseRepository;

/**
 * Class VendorRepository
 * @package App\Repositories
 * @version March 3, 2021, 11:36 pm WIB
 */

class VendorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'state_id',
        'district_id',
        'vendor_category_id',
        'name',
        'description',
        'email',
        'bank_account_number',
        'website',
        'address',
        'phone',
        'logo_src',
        'header_src'
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
        return Vendor::class;
    }

    public function save($input, $id = null)
    {
        if (request()->hasFile('logo_src') || request()->hasFile('header_src')) {
            $field = ['logo_src', 'header_src'];
            $path = 'vendors/';

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
