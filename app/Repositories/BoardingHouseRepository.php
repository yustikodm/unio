<?php

namespace App\Repositories;

use App\Models\BoardingHouse;
use App\Repositories\BaseRepository;

/**
 * Class BoardingHouseRepository
 * @package App\Repositories
 * @version March 18, 2021, 10:57 am WIB
*/

class BoardingHouseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'state_id',
        'district_id',
        'currency_id',
        'name',
        'description',
        'price',
        'address',
        'phone',
        'picture'
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
        return BoardingHouse::class;
    }
}
