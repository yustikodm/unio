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
}
