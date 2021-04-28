<?php

namespace App\Repositories;

use App\Models\VendorService;
use App\Repositories\BaseRepository;

/**
 * Class VendorServiceRepository
 * @package App\Repositories
 * @version March 3, 2021, 11:37 pm WIB
*/

class VendorServiceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'vendor_id',
        'name',
        'description',
        'level',
        'picture',
        'price'
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
        return VendorService::class;
    }

    public function save($input, $id = null)
    {
        if (request()->hasFile('picture')) {
            $field = ['picture'];
            $path = 'services/';

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
