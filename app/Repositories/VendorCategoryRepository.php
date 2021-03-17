<?php

namespace App\Repositories;

use App\Models\VendorCategory;
use App\Repositories\BaseRepository;

/**
 * Class VendorCategoryRepository
 * @package App\Repositories
 * @version March 3, 2021, 11:38 pm WIB
*/

class VendorCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
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
        return VendorCategory::class;
    }
}
