<?php

namespace App\Repositories;

use App\Models\PlaceToLive;
use App\Repositories\BaseRepository;

/**
 * Class PlaceToLiveRepository
 * @package App\Repositories
 * @version March 31, 2021, 3:27 pm WIB
*/

class PlaceToLiveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return PlaceToLive::class;
    }
}
